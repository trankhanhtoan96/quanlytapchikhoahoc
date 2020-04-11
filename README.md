# requirement
- PHP 7.1
- MySQL with mysqli support

# Helper
- Repair for sync and backup database: `project/admin/repair` file backup in `app/database/backup.database.sql`

# Variable in twig view
- lang (array): lang.app | lang.theme
- config (array)
- cur_lang (string)
- base_url (string)
- cur_uri (string)
- uri (array)
- db_def

# function in twigview
- `TwigFunction("view_field", function ($type, $name, $val, $listOption = array())`
- `TwigFunction("lang", function ($key, $location = 'app')`
- `TwigFunction("form_field", function ($type, $name, $required = "", $listOption = array(), $val = "", $addNullOption = 0)`

# Create new module
`http://<project>/admin/module/<module_name>`