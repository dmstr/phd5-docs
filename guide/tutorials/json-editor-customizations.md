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

# Add the editor resolver

In order to **USE** a custom editor you have to **REGISTER** it adding a "resolver" into
the `JSONEditor.defaults.resolvers` object, like this:

    JSONEditor.defaults.resolvers.unshift(function(schema) {
        if(schema.format === 'datepicker') {
            return 'datepicker'
        }
    });
    
after registration you can add something like this in your schema

    "Datum": {
       "title": 'Date',
       "type": "string",
       "format": "datepicker",
       "datepickerOptions": {
           "dateFormat": "dd-mm-yy",
           "constrainInput": false,
           "monthNames": [ "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember" ],
           "dayNamesMin": [ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
           "hideIfNoPrevNext": true,
           "firstDay": 1
       }
    }

# Custom validator

In example a custom validator that will be applied to schemas that have
`format === "datepicker"`  **AND** `schema.required === true`

    JSONEditor.defaults.custom_validators.push(function(schema, value, path) {
        var errors = [];
        if(schema.format === "datepicker" && schema.required === true) {
    
            if(typeof value === 'undefined' || value === '') {
                errors.push({
                    path: path,
                    property: 'required',
                    message: this.translate("error_notset")
                });
            }
    
        }
        return errors;
    });
    
now you can add a `required` property to the datepicker schema

       "Datum": {
           "title": 'Date',
           "type": "string",
           "format": "datepicker",
           "datepickerOptions": {
               "dateFormat": "dd-mm-yy",
               "constrainInput": false,
               "monthNames": [ "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember" ],
               "dayNamesMin": [ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
               "hideIfNoPrevNext": true,
               "firstDay": 1
           },
           "required": true    // <------- here
       }
    
# Add custom language error messages and set default language

    JSONEditor.defaults.language = "es";
    
    JSONEditor.defaults.languages.es = {
    	error_notset: "La propiedad se debe establecer"
    	error_notempty: "valor requerido",
    	error_enum: "El valor debe ser uno de los valores enumerados"
    	error_anyOf: "El valor debe validar contra al menos uno de los esquemas previstos"
    	error_oneOf: 'El valor debe validar contra Exactamente uno de los esquemas previstos. En la actualidad valida contra {{0}} del régimen ».
    	error_not: "El valor no debe validar contra el esquema proporcionado"
    	error_type_union: "El valor debe ser uno de los tipos previstos"
    	tipo_error: "El valor debe ser del tipo {0} {}"
    	error_disallow_union: "El valor no debe ser uno de los tipos previstos no permitidos"
    	error_disallow: "El valor no debe ser del tipo {0} {}"
    	error_multipleOf: "El valor debe ser un múltiplo de {0} {}"
    	error_maximum_excl: "El valor debe ser inferior a {0} {}"
    	error_maximum_incl: "El valor debe ser como máximo {{0}}"
    	error_minimum_excl: "El valor debe ser mayor que {0} {}"
    	error_minimum_incl: "El valor debe ser al menos {0} {}"
    	error_maxLength: "El valor debe ser en la mayoría de {{0}} caracteres"
    	error_minLength: "El valor debe ser al menos {0} {} caracteres"
    	error_pattern: "El valor debe coincidir con el patrón {0} {}"
    	error_additionalItems: "No hay datos adicionales permitidos en esta matriz"
    	error_maxItems: "El valor debe tener como máximo {{0}} artículos"
    	error_minItems: "Valor debe tener al menos {0} {} artículos"
    	error_uniqueItems: "array debe tener objetos únicos"
    	error_maxProperties: "El objeto debe tener como máximo {{0}} propiedades"
    	error_minProperties: "El objeto debe tener al menos {0} {} propiedades"
    	error_required: "El objeto no se encuentra la propiedad requerida '{0} {}'"
    	error_additional_properties: "No hay propiedades adicionales permitidos, pero la propiedad {0} {} se establece"
    	error_dependency: "debe tener la propiedad {0} {}"
    	button_delete_all: "Todo"
    	button_delete_all_title: "Eliminar todo"
    	button_delete_last: "Última {{0}}"
    	button_delete_last_title: "Eliminar último {{0}}"
    	button_add_row_title: "Añadir {{0}}"
    	button_move_down_title: "Bajar"
    	button_move_up_title: "Mover hacia arriba"
    	button_delete_row_title: "Eliminar {{0}}"
    	button_delete_row_title_short: "Borrar"
    	button_collapse: "colapso"
    	button_expand: "Ampliar"
    };

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
    