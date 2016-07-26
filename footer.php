<footer>

  <div class="full-container">

    <div class="social-icons">
      <?php if ( ! dynamic_sidebar( 'social-icons') ): ?>
      <h3>Social Icons Setup</h3>
      <p>Add the Social Icons widget to this footer section by going to Appearance > Widgets.</p>
      <?php endif; ?>
    </div>

    <div class="footer-strip">
      <span id="copyright">&copy; <?php bloginfo('name'); ?> <?php echo date ('Y') ?> &nbsp; &nbsp; &nbsp; Strunk &amp; White Theme by <a href="https://www.zenwebthemes.com/">ZenWebThemes.com</a></span>
    </div>

  </div><!-- end of full container -->

</footer>

<?php wp_footer(); ?>

</body>
</html>