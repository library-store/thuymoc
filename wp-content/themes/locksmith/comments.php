<?php function locksmith_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; 
   $allowed_html_array = array(
          'a' => array(
              'href' => array(),
              'title' => array()
          ),
          'br' => array(),
          'em' => array(),
          'strong' => array(),
      );
  ?>
  <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>">
      <header class="comment-author clearfix">
        <?php echo get_avatar($comment,$size='48'); ?>
        <div class="author-meta">
          <h5><?php printf(wp_kses(__('<cite class="fn">%s</cite>', 'locksmith'), $allowed_html_array), get_comment_author_link()) ?></h5>
          <time datetime="<?php echo comment_date('c') ?>"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s', 'locksmith'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(esc_html__('(Edit)', 'locksmith'), '', '') ?>
        </div>
      </header>
      
      <?php if ($comment->comment_approved == '0') : ?>
            <div class="notice alert-box">
              <p class="bottom"><?php esc_html__('Your comment is awaiting moderation.', 'locksmith') ?></p>
            </div>
      <?php endif; ?>
      
      <section class="comment">
        <?php comment_text() ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </section>

    </article>
    </li>
<?php } ?>

<?php
// Do not delete these lines
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

  if ( post_password_required() ) { ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php echo esc_html__('This post is password protected. Enter the password to view comments.', 'locksmith'); ?></p>
    </div>
  </section>
  <?php
    return;
  }
?>
<?php // You can start editing here. Customize the respond form below ?>
<?php if ( have_comments() ) : ?>
  <section id="comments">
    <h3><?php comments_number(esc_html__('No Responses to', 'locksmith'), esc_html__('One Response to', 'locksmith'), esc_html__('% Responses to', 'locksmith') ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

      <?php if(comments_open() || get_comments_number()) { ?>
      <ol class="commentlist">
    <?php wp_list_comments('callback=locksmith_comments'); ?>

    </ol>
      <?php } ?>
    <footer>
      <nav id="comments-nav">
        <div class="comments-previous"><?php previous_comments_link( esc_html__( '&larr; Older comments', 'locksmith' ) ); ?></div>
        <div class="comments-next"><?php next_comments_link( esc_html__( 'Newer comments &rarr;', 'locksmith' ) ); ?></div>
      </nav>
    </footer>
  </section>
<?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) : ?>
  <?php else : // comments are closed ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php esc_html__('Comments are closed.', 'locksmith') ?></p>
    </div>
  </section>
  <?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<section id="respond" class="wd-section-reply">
  <h4><?php comment_form_title( esc_html__('Leave a Reply', 'locksmith'), esc_html__('Leave a Reply to %s', 'locksmith') ); ?></h4>
  <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
  <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : 
  	 $allowed_html_array = array(
          'a' => array(
              'href' => array(),
              'title' => array()
          ),
          'br' => array(),
          'em' => array(),
          'strong' => array(),
      );
  	?>
  <p><?php printf( wp_kses(__('You must be <a href="%s">logged in</a> to post a comment.', 'locksmith'), $allowed_html_array), wp_login_url( get_permalink() ) ); ?></p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if ( is_user_logged_in() ) : 
    	 $allowed_html_array = array(
          'a' => array(
              'href' => array(),
              'title' => array()
          ),
          'br' => array(),
          'em' => array(),
          'strong' => array(),
      );
    	?>
    <p><?php printf(wp_kses(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'locksmith'),$allowed_html_array), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_html__('Log out of this account', 'locksmith'); ?>"><?php esc_html__('Log out &raquo;', 'locksmith'); ?></a></p>
    <?php else : ?>
    
      <div class="large-4 columns"><input type="text" placeholder="<?php echo esc_html__('Name','locksmith') ?>" required class="five" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
    </div>
    
     <div class="large-4 columns"> <input type="text" placeholder="<?php echo esc_html__('E-mail','locksmith') ?>" required class="five" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
    </div>
    
    <div class="large-4 columns">  <input type="text" placeholder="<?php echo esc_html__('Sitweb','locksmith') ?>" required class="five" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
    </div>
    <?php endif; ?>
    <div class="large-12 columns">
     
      <textarea cols="15" rows="8" placeholder="<?php echo esc_html__('Comment','locksmith') ?>" name="comment" id="comment" tabindex="4"></textarea>
    </div>
    
    <p><input name="submit" class="small radius button" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment', 'locksmith'); ?>"></p>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; // If registration required and not logged in ?>
</section>
<?php endif; // if you delete this the sky will fall on your head ?>