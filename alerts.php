<?php
if (isset($_SESSION['message'])) {
    if ($_SESSION['message'] == 'taskadded') {
        echo '<div class="alert alert-success">
        <strong>Success!</strong> New task added!
        </div>';
        unset($_SESSION['message']);
    } elseif ($_SESSION['message'] == 'taskdeleted') {
        echo '<div class="alert alert-danger">
        <strong>Poof!</strong> Task deleted!
        </div>';
        unset($_SESSION['message']);
    } elseif ($_SESSION['message'] == 'taskupdated') {
        echo '<div class="alert alert-success">
        <strong>Success!</strong> Task updated!
        </div>';
        unset($_SESSION['message']);
    }
}
?>