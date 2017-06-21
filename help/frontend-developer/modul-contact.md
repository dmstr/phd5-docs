
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

### Step 3
Create a new `availableRoute` with the name `/contact/default/index`

### Step 4
Create a new Page in **Pages** and choose the Route `/contact/default/index`
and additional create a object in the Advanced section: `schema:name`

### Step 5
Create a new authorization (Berechtigung) with the name `contact_default_index`
und assign it to the `public user`
