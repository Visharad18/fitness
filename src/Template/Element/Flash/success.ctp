<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" style="z-index: 999999" onclick="this.classList.add('hidden')"><?= $message ?></div>
