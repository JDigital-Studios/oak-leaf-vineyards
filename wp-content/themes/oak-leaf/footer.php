				<footer class="footer" role="contentinfo">
					<div class="inner-footer">
						<div class="grid-x grid-margin-x grid-padding-x">
	  						<div class="small-12 medium-12 large-12 cell">
	  							<nav role="navigation">
				                  <ul class="menu align-center-middle text-center">
				              			<li><div class="footer-logo" alt="logo"><?php $footerLogo = get_template_directory_uri() . '/assets/images/tree.svg'; echo file_get_contents($footerLogo); ?></div></li>
				              		</ul>
		    					</nav>
		    				</div>
            			</div>
			            <div class="grid-x grid-margin-x grid-padding-x align-center-middle text-center">
				            <div class="small-12 medium-12 large-12 cell">
				                <nav role="navigation">
				                  	<ul class="menu footer-links align-center-middle text-center">
				                    	<li class="text-center wrapping-footer-links"><?php joints_footer_links(); ?></li>
				                  	</ul>
				                </nav>
				            </div>
			            </div>
			            <div class="grid-container-full source-org copyright">
				            <div class="grid-x grid-margin-x grid-padding-x align-center-middle text-center">
				    			<div class="small-12 medium-12 large-12 cell">
				    				<p class="text-center">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, Ripon, CA</p>
				    			</div>
				            </div>
			            </div>
					</div> <!-- end #inner-footer -->
				</footer> <!-- end .footer -->
			</div>  <!-- end .off-canvas-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>

		<!-- cookie-consent-script v1 -->
		<script id="CookieDeclaration" src="https://consent.cookiebot.com/8f9ecdb2-c40e-411a-aa50-87ab7a77297d/cd.js" type="text/javascript" async></script>
		<script>
		// Cookiebot "Do Not Sell Or Share My Personal Information" link -> native preferences dialog
		(function () {
			function clickDetails(tries) {
				var candidates = document.querySelectorAll(
					'#CybotCookiebotDialog button, #CybotCookiebotDialog [role="button"], #CybotCookiebotDialog a'
				);
				for (var i = 0; i < candidates.length; i++) {
					var el = candidates[i];
					var txt = (el.textContent || '').replace(/\s+/g, ' ').trim().toLowerCase();
					if (txt === 'details' || txt.indexOf('see details') > -1 || txt.indexOf('show details') > -1) {
						var rect = el.getBoundingClientRect();
						if (rect.width > 0 && rect.height > 0) { el.click(); return; }
					}
				}
				if (tries > 0) { setTimeout(function () { clickDetails(tries - 1); }, 500); }
			}
			function openCookiebot() {
				if (window.Cookiebot && typeof window.Cookiebot.renew === 'function') {
					window.Cookiebot.renew();
					setTimeout(function () { clickDetails(6); }, 400);
				} else {
					setTimeout(openCookiebot, 300);
				}
			}
			document.addEventListener('click', function (event) {
				var link = event.target.closest('#ct-cookiebot-preferences-link');
				if (link) { event.preventDefault(); openCookiebot(); }
			});
		})();
		</script>
		<!-- /cookie-consent-script v1 -->
	</body>
</html> <!-- end page -->
