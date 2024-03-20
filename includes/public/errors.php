<?php if (count($errors) > 0) : ?>
    <div class="message error validation_errors" >
        <?php
        
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
    ?>
    </div>
<?php endif ?>