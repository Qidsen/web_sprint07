<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charset</title>
</head>
<body>
    <h2>Charset</h2>
    <form action="index.php" method="post">
        <label>Change charset:</label>
        <p><input type="text" name="input_string" placeholder="Input string"></p>
        <label>Select charset or several charsets:</label>
        <select name="charsets[]" size="3" multiple>
            <option value="UTF-8">UTF-8</option>
            <option value="ISO-8859-1">ISO-8859-1</option>
            <option value="Windows-1252">Windows-1252</option> 
        </select>
        <input type="submit" name="change_charset" value="Change charset">
    </form>
    <form>
        <input type="submit" name="clear" value="Clear">
    </form>
    <p>
    <?php
        if ($_POST) {
            echo '<p>
            <label>Input string:</label>
            <textarea placeholder="$ and € are a currency ">'.$_POST["input_string"].'</textarea>
            </p>';

            if ($_POST["charsets"]) {
                foreach($_POST["charsets"] as $charset) {

                    if ($charset == "UTF-8") {
                        echo '<p>
                        <label>UTF-8:</label>
                        <textarea placeholder="$ and € are a currency ">'.mb_convert_encoding($_POST["input_string"], "UTF-8").'</textarea>
                        </p>';
                    }

                    if ($charset == "ISO-8859-1") {
                        echo '<p>
                        <label>ISO-8859-1:</label>
                        <textarea placeholder="$ and EUR are a currency ">'.mb_convert_encoding($_POST["input_string"], "ISO-8859-1").'</textarea>
                        </p>';
                    }

                    if ($charset == "Windows-1252") {
                        echo '<p>
                        <label>Windows-1252:</label>
                        <textarea placeholder="$ and � are a currency ">'.mb_convert_encoding($_POST["input_string"], "Windows-1252").'</textarea>
                        </p>';
                    }

                }
            }
        }
    ?>
    </p>
</body>
</html>
