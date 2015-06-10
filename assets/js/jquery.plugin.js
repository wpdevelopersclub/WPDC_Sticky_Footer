/*!
 * JavaScript|jQuery functions
 *
 * @package     WPDC_Sticky_Footer
 * @since       1.0.0
 * @author      WPDevelopersClub and hellofromTonya
 * @link        http://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

;(function( $, window, document, undefined ){

    'use_strict';

    var plugin = {},
        $stickyFooter, $panel;

    plugin.init = function() {

        $stickyFooter = $('#sticky-footer');
        if ( typeof $stickyFooter === "undefined" || $stickyFooter == null ) {
            return false;
        }

        $panel = $stickyFooter.find('.sticky-footer-panel');
        if ( typeof $panel === "undefined" || $panel == null ) {
            return false;
        }

        _scrollToTop();
        _panelHandler();
        _handle();
    }

    /**
     PRIVATE FUNCTIONS
     */

    function _panelHandler() {

        $panel
            .delay(2500)
            .slideToggle(1250);

        var $panelItems = $panel.find('.panel-item');

        $panelItems.on('click', function() {
            var isExpanded = ( $(this).hasClass('expanded') );

            _resetSubpanels( $panelItems, $(this), isExpanded );

            if ( ! isExpanded ) {
                _itemHandler( $(this) );
            }

            return false;
        });

        return false;
    }

    function _handle() {
        var $handle = $stickyFooter.find('.sticky-footer-handle');

        $handle.on( 'click', function () {
            $(this).toggleClass('expanded');
            $panel.slideToggle(1000);
        });

        return false;
    }

    function _itemHandler( $panelItem ) {

        var classNames = $panelItem.attr('class'),
            subPanelID = $panelItem.data('subpanel');

        if ( classNames == 'panel-item scroll-to-top' ) {
            return false;
        }

        if ( typeof subPanelID === "undefined" || subPanelID == null ) {
            return false;
        }

        var $subPanel = $panel.find( "#" + subPanelID );
        if ( typeof $subPanel === "undefined" || $subPanel == null ) {
            return false;
        }

        var pos             = $panelItem.offset(),
            subPanelWidth   = $subPanel.outerWidth(),
            subpanelLeft    = ( pos.left + ( $panelItem.outerWidth() / 2 ) ) - ( subPanelWidth / 2 ),
            offset          = $( window ).outerWidth() - 60 - ( subpanelLeft + subPanelWidth );

        subpanelLeft = offset < 0 ? subpanelLeft + offset : subpanelLeft;

        $subPanel.css({
            left: subpanelLeft
        });

        $panelItem.addClass('expanded');

        _resetSubpanelAfterClick( $panelItem, $subPanel );

        $subPanel = pos = classNames = $panelItem = subPanelID = null;
        return false;
    }

    function _resetSubpanelAfterClick( $panelItem, $subPanel ) {
        $subPanel.find('a').on( 'click', function() {
            _hideSubpanel( $panelItem, $subPanel );
        });
    }

    function _resetSubpanels( $panelItems, $currentPanelItem, isExpanded ) {

        if ( isExpanded ) {
            _hideSubpanel( $currentPanelItem );
            return false;
        }

        $panelItems.each( function() {

            if ( $(this).hasClass('expanded') ) {
                _hideSubpanel( $(this) );
            }
        });
    }

    function _hideSubpanel( $panelItem, $subpanel ) {

        $subpanel = typeof $subpanel === "undefined" ? $panelItem.next() : $subpanel;
        $panelItem.removeClass('expanded');

        $subpanel.css({
            left: -9999
        });
    }

    function _scrollToTop() {

        $panel.find('.scrollup').click(function(){
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    }

    $(document).ready(function () {

        plugin.params = typeof wpdevsclub_sticky_footer_l10 === 'undefined'
            ? ''
            : wpdevsclub_sticky_footer_l10;

        plugin.init();

    });

})(jQuery, window, document);