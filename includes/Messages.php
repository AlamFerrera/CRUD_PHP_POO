<?php
session_start();

function setMessage($text, $color){
    $_SESSION['message'] = $text;
    $_SESSION['color'] = $color;
}

function displayMessage(){ ?>

<div class="alert alert-<?= $_SESSION['color']; ?>" role="alert">
    <?= $_SESSION['message']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php
session_unset();
}
?>
