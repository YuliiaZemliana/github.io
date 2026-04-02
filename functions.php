
<?php
// Підключення стилів та скриптів
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', [], filemtime(get_template_directory() . '/assets/css/main.css'));
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], filemtime(get_template_directory() . '/assets/js/main.js'), true);

    // Локалізація AJAX URL для JS
    wp_localize_script('main-js', 'ajaxData', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
});

// AJAX для відправки форми (для авторизованих і неавторизованих користувачів)
add_action('wp_ajax_send_to_telegram', 'send_to_telegram');
add_action('wp_ajax_nopriv_send_to_telegram', 'send_to_telegram');

function send_to_telegram() {
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    $text = "Нова заявка з портфоліо:\nІмʼя: $name\nТелефон: $phone\nПовідомлення: $message";

    $token = "8547780128:AAEf2bcAPkDgfYCiwvJ9jKXKn0FiMdYpTPk";
    $chat_id = "237221312";

    // Відправка через wp_remote_get
    wp_remote_get("https://api.telegram.org/bot$token/sendMessage", [
        'body' => [
            'chat_id' => $chat_id,
            'text' => $text
        ]
    ]);

    wp_send_json_success('Message sent');
}
