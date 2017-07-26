# Custom editor

First of all when we use the word "editor" in the JSONEditor world we are 
actually saying "input". Every input in the generated form is an editor. So an
editor can be a textarea, a checkbox, a bunch of radio buttons, etc.

JSONEditor comes with built in editors but we can "build" our custom editor
to. In order to build an editor we have to "extend" (javascript does not have 
inheritance) the built in "JSONEditor.AbstractEditor" class. and add it to the
`JSONEditor.defaults.editors` object.

In example a date picker editor that needs (as a dependency) the jquery datepicker.

    JSONEditor.defaults.editors.datepicker = JSONEditor.AbstractEditor.extend({
        build: function () {
            var self = this;
    
            // group
            self.group = document.createElement('div');
            self.group.classList.add('form-group');
            self.container.appendChild(self.group);
    
            // label
            self.label = document.createElement('label');
            self.label.classList.add('control-label');
            self.label.innerText = self.schema.title ? self.schema.title : '';
            self.group.appendChild(self.label);
    
            // input
            self.input = document.createElement('input');
            self.input.type = 'text';
            self.input.name = self.formname; // IMPORTANT
            self.input.classList.add('form-control');
            self.group.appendChild(self.input);
    
            // infos
            self.infos = document.createElement('p');
            self.infos.classList.add('help-block');
            self.infos.classList.add('errormsg');
            self.group.appendChild(self.infos);
    
            // set the input as a datepicker and configure it
            self.customDatepickerOptions = self.schema.datepickerOptions ? self.schema.datepickerOptions : {};
            self.customDatepickerOptions.minDate = new Date();
            self.customDatepickerOptions.onSelect = function(selectedDate) {
                self.value = selectedDate; // IMPORTANT
                self.onChange(true); // IMPORTANT
                if(self.jsoneditor.options.show_errors !== "never") {
                    window.requestAnimationFrame(function() {
                        if (self.validate()) {
                            self.displayErrorMessages();
                        }
                    });
                }
            };
            $(self.input).datepicker(self.customDatepickerOptions);
    
    
            // validate istantly if show_errors === "always"
            if(self.jsoneditor.options.show_errors === "always") {
                window.requestAnimationFrame(function() {
                    if (self.validate()) {
                        self.displayErrorMessages();
                    }
                });
            }
    
        },
    
        validate: function () {
            var self = this;
            self.errors = '';
            self.jsoneditor.validation_results.forEach(function (error) {
                if (error.path === self.path) {
                    self.errors = error.message;
                }
            });
            if (self.errors) {
                return self.errors;
            } else {
                self.hideErrorMessages();
            }
        },
    
        displayErrorMessages: function () {
            var self = this;
            self.infos.innerText = self.errors;
            self.group.classList.add('has-error');
        },
    
        hideErrorMessages: function () {
            var self = this;
            self.infos.innerText = '';
            self.group.classList.remove('has-error');
        }
    
    });

# Resolvers: using custom editors

JSONEditor uses **resolvers** to know wich editor to use with a specific schema.
First it must know the type of **value** (string, boolean, number, etc), and 
optionally the **format** (color, table, html, checkbox, etc).
In fact a checkbox could be used for a boolean type but also for a string type.
You can add extra resolvers to JSONEditor.
If we want to tell JSONEditor that we want to use our custom datepicker editor
with the following schema:

        "date": {
           "type": "string",
           "format": "datepicker"
        }

Then we must tell JSON Editor that any schema that has type "string" and format 
"datepicker" must resolve (use) the datepicker edito. like this:

    JSONEditor.defaults.resolvers.unshift(function(schema) {
        if(schema.format === 'datepicker' && schema.type === 'string') {
            return 'datepicker'
        }
    });
    
If two resolvers follow the same parameters, the new one will be used instead.


# Custom validator

The process of adding custom validations is similar to the resolver process.
Let's say we want the value of our datepicker to be setted and to do so
we modify our scheme like this:

        "date": {
           "type": "string",
           "format": "datepicker",
           "setted": true
        }

We need to tell JSONEditor again which parameters must follow. like this:

    JSONEditor.defaults.datepicker.push(function(schema, value, path) {
        var errors = [];
        if(schema.format === "datepicker" && schema.type === 'string' && schema.setted === true) {
        
            function isSet(pValue) {
                // isSet validation code that
                // returns true if value is setted
            }
    
            if(!isSet(value)) {
                errors.push({
                    path: path,
                    property: 'setted',
                    message: this.translate("error_notset")
                });
            }
    
        }
        return errors;
    });

Note the JSONEditor.defaults.`datepicker`.push part.

If the editor does not have a valid value an error object will be created and
returned to JSONEditor. The `this.translate("error_notset")` is a JSONEditor 
feature for i18n. Read the netxt topic for more information.
    
# i18n (add translations)
    
JSON Editor uses a translate function to generate strings in the UI. A default en
language mapping is provided. You can easily override individual translations in
the default language or create your own language mapping entirely.

-Override a specific translation

    JSONEditor.defaults.languages.en.error_minLength = "This better be at least {{0}} characters long or else!";

-Create your own language mapping. Any keys not defined here will fall back to
the "en" language

    JSONEditor.defaults.languages.es = {
      error_notset: "propiedad debe existir"
    };

By default, all instances of JSON Editor will use the en language. To override
this default, set the JSONEditor.defaults.language property.

    JSONEditor.defaults.language = "es";  
    
# YII integration: Asset Bundle

    namespace app\assets;
    
    use yii\web\AssetBundle;
    
    class JsonEditorExtraAsset extends AssetBundle
    {
        public $sourcePath = '@app/assets/web';
    
        public $js = [
            'js/editors/datepicker.js',
            'js/languages/de.js',
        ];
    
        public $depends = [
            'beowulfenator\JsonEditor\JsonEditorAsset',
        ];
    }
    
Registering with Twig:

    {{ use ('app/assets/JsonEditorExtraAsset') }}
    {{ register_json_editor_extra_asset() }}
    