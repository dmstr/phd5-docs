Media Files
----

This is your **file manager** for your website. It basically works like the finder (mac) or explorer (pc).

### What can I do?

<code>Folder:</code>
You can **add**, **name**, **rename** and **delete** folders

- to create a folder click on the 3 dots on the right side
- to open a folder doubleclick on it
- for more option right click the folder (e.g. delete)
 

<code>Files:</code>
You can **add**, **name**, **rename**, **download**, **view** and **delete** files

- to add a file into the current folder just drag & drop it into the file manager or click on the 3 dots on the right side
- to preview a file doubleclick it (depending on which file format, e.g. you can look at a png)
- for more options right click on a file (e.g. download, view, rename, etc..)

### Possible file types:

JPEG, JPG, PNG, PDF, ZIP, GIF, SVG, ICO

___

### Images

<code>/en/filefly/test</code>


![filemanager](./images/file-manager.png)


### Filefly

    {{ use ('hrzg/filemanager/widgets') }}
    {{ file_manager_widget_widget(
        {
            'handlerUrl': url(['/filefly/api'])
        }
    ) }}

