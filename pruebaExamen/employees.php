<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    // retrieve the record's information 
    $query = 'SELECT
            emp_no, birth_date, first_name, last_name, gender, hire_date
        FROM
            employees
        WHERE
            emp_no = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    // set values to blank
    $emp_no = '';
    $birth_date = '';
    $first_name = '';
    $last_name = '';
    $gender = 0;
    $hire_date = '';
}
?>
<html>
<head>
    <title><?php echo ucfirst($_GET['action']); ?> Person</title>
    <style type="text/css">
        <!--
        #error { background-color: #600; border: 1px solid #FF0; color: #FFF;
        text-align: center; margin: 10px; padding: 10px; }
        -->
    </style>
</head>
<body>
    <?php
    if (isset($_GET['error']) && $_GET['error'] != '') {
        echo '<div id="error">' . $_GET['error'] . '</div>';
    }
    ?>
    <form action="N6P105commit.php?action=<?php echo $_GET['action']; ?>&type=employee"
        method="post">
        <table>
            <tr>
                <td>Emp No</td>
                <td><input type="number" name="emp_no"
                    value="<?php echo $emp_no; ?>"/></td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td><input type="date" name="birth_date"
                    value="<?php echo $birth_date; ?>"/></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="first_name"
                    value="<?php echo $first_name; ?>"/></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name"
                    value="<?php echo $last_name; ?>"/></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="gender">
                        <option value="1" <?php echo ($gender == 1) ? 'selected="selected"' : ''; ?>>M</option>
                        <option value="0" <?php echo ($gender == 0) ? 'selected="selected"' : ''; ?>>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hire date</td>
                <td><input type="date" name="hire_date"
                    value="<?php echo $hire_date; ?>"/></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <?php
                    if ($_GET['action'] == 'edit') {
                        echo '<input type="hidden" value="' . $_GET['id'] . '" name="emp_no" />';
                    }
                    ?>
                    <input type="submit" name="submit"
                        value="<?php echo ucfirst($_GET['action']); ?>" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
