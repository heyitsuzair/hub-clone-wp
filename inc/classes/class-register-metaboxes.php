<?php

/**
 * File To Register Custom Meta Boxes
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class Register_Metaboxes
{
    use Singleton;


    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
          @Hooks
         */
        add_action('add_meta_boxes', [$this, 'register_meta_boxes']);
        add_action('save_post', [$this, 'save_post']);
    }
    public function register_meta_boxes()
    {
        add_meta_box(
            'moral', // $id
            __('Moral Of Post', 'wp_hub'), // $title
            [$this, 'meta_box_fields'], // $callback
            'post', // $screen
            'side', // $context
            'high' // $priority
        );
    }
    public function meta_box_fields($post)
    {
        $value = get_post_meta($post->ID, 'moral_of_post', true);
        /**
         * Use Nonce Verification
         */

        wp_nonce_field(plugin_basename(__FILE__), 'moral_meta_box_nonce');
?>
<input name="hub_post_moral" id="post_moral" value='<?php echo $value ?>'
    placeholder="<?php echo __('Enter Text', 'wp_hub') ?>" />
<?php

    }
    public function save_post($post_id)
    {
        /**
         First @param on array_key_exists is the "name" attribute of field from which data is coming in our case it is select with name="post_moral"
         Second @param of update_post_meta is "meta_key" that you have to put when you called "get_post_meta". Its Second Param is "meta_key"
         */

        /**
         * When Post is saved or updated we get $_POST available
         * Check If Current User Is Authorized To Do This
         */

        if (!current_user_can('edit_posts')) return;

        /**
         * Check If The Nonce Value We Received Is Same We Created
         */

        if (!isset($_POST['moral_meta_box_nonce']) || !wp_verify_nonce($_POST['moral_meta_box_nonce'], plugin_basename(__FILE__))) return;


        if (array_key_exists('hub_post_moral', $_POST)) {
            update_post_meta(
                $post_id,
                'moral_of_post',
                $_POST['hub_post_moral']
            );
        }
    }
}