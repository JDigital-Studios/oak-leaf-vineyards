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
		<?php if ( ! empty( $twg_legal_popups ) ) : ?>
		<?php
		$twg_legal_settings = get_option( 'twg_legal_settings', array() );
		$twg_legal_site     = ! empty( $twg_legal_settings['legal_name'] ) ? $twg_legal_settings['legal_name'] : 'Oak Leaf Vineyards';
		$twg_legal_email    = ! empty( $twg_legal_settings['legal_email_domain'] ) ? $twg_legal_settings['legal_email_domain'] : 'oakleafvineyards';
		?>
		<!-- Hidden TWG Legal popup containers, hydrated by the twg-legal plugin SDK.
		     The link inside each body slot is a fallback that stays in place if the
		     SDK never runs, so the age-gate links are never dead. -->
		<div class="legal-popup-content" id="twg-terms-popup" data-twg-legal-popup data-legal-slug="terms-of-service" data-legal-site="<?php echo esc_attr( $twg_legal_site ); ?>" data-legal-emaildomain="<?php echo esc_attr( $twg_legal_email ); ?>">
			<div data-twg-legal-popup-body><p><a href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>">Terms of Service</a></p></div>
		</div>
		<div class="legal-popup-content" id="twg-privacy-popup" data-twg-legal-popup data-legal-slug="privacy-policy" data-legal-site="<?php echo esc_attr( $twg_legal_site ); ?>" data-legal-emaildomain="<?php echo esc_attr( $twg_legal_email ); ?>">
			<div data-twg-legal-popup-body><p><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a></p></div>
		</div>
		<?php endif; ?>
		<?php wp_footer(); ?>

		<!-- cookie-consent-script v1 — footer "Do Not Sell Or Share My Personal Information"
		     handler only. The Cookiebot declaration script (cd.js) is deliberately NOT
		     loaded here: it injected the whole cookie declaration inline underneath the
		     footer on every page. Put it on a dedicated cookie-policy page if needed. -->
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
