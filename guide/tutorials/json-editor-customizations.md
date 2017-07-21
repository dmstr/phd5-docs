# custom editor

In example a date picker editor that needs (as a dependency) the jquery datepicker.

    JSONEditor.defaults.editors.datepicker = JSONEditor.AbstractEditor.extend({
        build: function () {
            var self = this;
    
            // form-group element (bootstrap friendly)
            self.customFormGroup = document.createElement('div');
            self.customFormGroup.classList.add('form-group');
    
            // form-label element and stores a reference(bootstrap friendly)
            self.customLabel = document.createElement('label');
            self.customLabel.classList.add('control-label');
            if (self.schema.title) {
                self.customLabel.innerText = self.schema.title;
            }
    
            // form control element (bootstrap friendly)
            self.customInput = document.createElement('input');
            self.customInput.type = 'text';
            self.customInput.name = self.formname;
            self.customInput.classList.add('form-control');
    
            // creates a paragraph for error messages and stores reference
            self.customErrorMessage = document.createElement('p');
            self.customErrorMessage.setAttribute('style', 'color: #a94442;');
    
            // datepicker options
            self.customDatepickerOptions;
            if (self.schema.datepickerOptions) {
                 self.customDatepickerOptions = self.schema.datepickerOptions;
            } else {
                 self.customDatepickerOptions = {};
            }
    
            // the min date will be ALWAYS today
            self.customDatepickerOptions.minDate = new Date();
    
            // event that triggers editor update
            self.customDatepickerOptions.onClose = function(selectedDate) {
                // update the editor value
                self.value = selectedDate;
                // tells JSONEditor that the values has changed
                self.onChange(true);
    
                // wait that the JSONEditor change event completed. Mr jdord wanted
                //to use a requestAnimationFrame for this job. So i had to use it to.
                window.requestAnimationFrame(function() {
                    if (self.validate()) {
                        self.displayErrorMessages();
                    }  
                });
            };
    
            // transforms the input in a date picker
            $(self.customInput).datepicker(self.customDatepickerOptions);
    
            // append form group to the editor container
            self.customFormGroup.appendChild(self.customLabel);
            self.customFormGroup.appendChild(self.customInput);
            self.container.appendChild(self.customFormGroup);
            self.container.appendChild(self.customErrorMessage);
        },
    
        validate: function () {
            // get this editor error
            var self = this;
            self.customErrorMessages = '';
            self.jsoneditor.validation_results.forEach(function (error) {
                if (error.property === self.schema.format) {
                    self.customErrorMessages = error.message;
                    console.log('validate', self.customErrorMessages)
                }
            });
            // return error messages if any
            if (self.customErrorMessages) {
                return self.customErrorMessages;
            } else {
                self.hideErrorMessages();
            }
        },
    
        displayErrorMessages: function () {
            var self = this;
            self.customErrorMessage.innerText = self.customErrorMessages;
            self.customLabel.setAttribute('style', 'color: #a94442;');
        },
    
        hideErrorMessages: function () {
            console.log('hide errors');
            var self = this;
            self.customErrorMessage.innerText = '';
            self.customLabel.setAttribute('style', 'color: #000;');
        }
    
    });

# Add the editor resolver

In order to use a custom editor you have to register it, like this

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
       },
       "propertyOrder": 1,
       "required": true,
       "options": {
           "grid_columns": 3
       }
   }

# custom validator

In example a custo validator that will be applied to schemas that have `format === "datepicker"` 

    JSONEditor.defaults.custom_validators.push(function(schema, value, path) {
      var errors = [];
      if(schema.format === "datepicker" && schema.required === true) {
    
        if(typeof value === 'undefined' || value === '') {
            errors.push({
                path: path,
                property: 'datepicker', // IMPORTANT! this must be the name of the editor
                message: this.translate("error_notset")
            });
        }
    
      }
      return errors;
    });
    
# add custom language error messages and set default language

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
