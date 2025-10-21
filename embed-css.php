<?php

/**
 * Встроить CSS прямо в HTML (временное решение)
 * Замените ссылку на CSS в main-layout.blade.php на этот файл
 */

header('Content-Type: text/css');
echo file_get_contents('public/css/ios-styles.css');
