
## How to create a new form

### Step 1
Create Form in Settings. This 5 seetings are needed: 

`name.schema`

`name.confirmMail`

`name.fromEmail`

`name.subject`

`name.toEmail`

### Step 2
 Define Layout in Twig Layouts. You will need `contact:name` and `contact:name:send`
 
 
Example `contact:name` Twig

```
{{ use('beowulfenator/JsonEditor') }}
{{ use ('hrzg/widget/widgets') }}
{{ cell_widget({id: 'first_top'}) }}

<script src="https://use.typekit.net/mmi4enh.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="dine-form coupon-form" id="contact-form">

            {% if success %}
            
                <div class="alert alert-success">
                    Your message has been sent. Thank you!
                </div>
            
            {% else %}
            
                {{ use('yii/widgets/ActiveForm') }}    
                {% set form = active_form_begin({
                    'id': 'contact-form',
                    'action' : '',
                    'options': {
                    }
                }) %}
            
                    {% set script %}
            JSONEditor.defaults.language = "de";
            JSONEditor.defaults.languages.de = {
              error_minLength: "Muss mindestens \{\{0\}\} Zeichen enthalten",
              error_notset: "Muss gesetzt sein",
              error_notempty: "Pflichtfeld"
            };
            {% endset %}
            {{ this.registerJs(script) }}
                    {{ form.errorSummary(model) | raw }}
                    {{ this.registerJs('JSONEditor.plugins.selectize.enable = true;') }}
                
        
                {{ json_editor_widget_widget(
                    {
                        'model': model,
                        'attribute': 'json',
                        'options': {
                            'id': 'contact-json'
                        },
                        'clientOptions': {
                            'theme': 'bootstrap3',
                            'disable_collapse': true,
                            'disable_edit_json': true,
                            'disable_properties': true,
                            'no_additional_properties': true,
                            'show_errors': 'always'
                        },
                        'schema': schema,
                    }
                ) }}   
            
                {{ Html.submitButton('Senden', {
                    'class': 'btn btn-primary btn-default',
                }) | raw }}
                       
        
                
            {{ active_form_end() }}
            
            {% endif %}
            
            </div>
        </div>
    </div>
</div>

{{ cell_widget({id: 'first_main'}) }}
{{ cell_widget({id: 'main'}) }}

```

Example `contact:name:send` Twig

```
{{ use ('hrzg/widget/widgets') }}
{{ cell_widget({id: 'first_send_top'}) }}
{{ cell_widget({id: 'first_send_main'}) }}
```

### Step 3
Create a new `availableRoute` with the name `/contact/default/index`

### Step 4
Create a new Page in **Pages** and choose the Route `/contact/default/index`
and additional create a object in the Advanced section: `schema:name`

### Step 5
Create a new authorization (Berechtigung) with the name `contact_default_index`
und assign it to the `public user`

### How to add a date picker

If you like to add a all browser working `date picker` you need a script in the `twig` and some extra `css`.

Code for Twig

```
{# documentation: https://jqueryui.com/datepicker/ #} 
{# styles are in less/form.less #} 

{% set datePickerScript %}
    $.ajax({
      url: 'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
      dataType: "script",
      success: function () {
        $('[name="root[Datum]"]').datepicker({
            dateFormat: "dd-mm-yy",
            constrainInput: false
        });
      }
    });
{% endset %}
{{ this.registerJs(datePickerScript) }}

```

CSS for Less
```
.ui-datepicker {
    background: #fff;
    font-size:11px;
    padding:10px;
    border:1px solid #ccc;
}

.ui-datepicker-header {
    margin-bottom: 30px;
}
 
.ui-datepicker table {
    width:278px;
}
 
.ui-datepicker table td,
.ui-datepicker table th {
    padding: 5px 0;
    text-align:center;
}
 
.ui-datepicker a {
    cursor:pointer;
    text-decoration:none;
}
 
.ui-datepicker-prev {
}
 
.ui-datepicker-next {
    float:right;
}
 
.ui-datepicker-title {
    display: inline-block;
    font-weight:bold;
    -webkit-transform: translate(90px, 0px);
        -ms-transform: translate(90px, 0px);
            transform: translate(90px, 0px);
}

```
