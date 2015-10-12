<?php
if( class_exists( 'WP_Customize_Control' ) ):
	class Fontawesome_Customizer_Picker extends WP_Customize_Control {
        
        public $options = array( 
            '500px',
            'amazon',
            'balance-scale',
            'battery-0',
            'battery-1',
            'battery-2',
            'battery-3',
            'battery-4',
            'battery-empty',
            'battery-full',
            'battery-half',
            'battery-quarter',
            'battery-three-quarters',
            'black-tie',
            'calendar-check-o',
            'calendar-minus-o',
            'calendar-plus-o',
            'calendar-times-o',
            'cc-diners-club',
            'cc-jcb',
            'chrome',
            'clone',
            'commenting',
            'commenting-o',
            'contao',
            'creative-commons',
            'expeditedssl',
            'firefox',
            'fonticons',
            'genderless',
            'get-pocket',
            'gg',
            'gg-circle',
            'hand-grab-o',
            'hand-lizard-o',
            'hand-paper-o',
            'hand-peace-o',
            'hand-pointer-o',
            'hand-rock-o',
            'hand-scissors-o',
            'hand-spock-o',
            'hand-stop-o',
            'hourglass',
            'hourglass-1',
            'hourglass-2',
            'hourglass-3',
            'hourglass-end',
            'hourglass-half',
            'hourglass-o',
            'hourglass-start',
            'houzz',
            'i-cursor',
            'industry',
            'internet-explorer',
            'map',
            'map-o',
            'map-pin',
            'map-signs',
            'mouse-pointer',
            'object-group',
            'object-ungroup',
            'odnoklassniki',
            'odnoklassniki-square',
            'opencart',
            'opera',
            'optin-monster',
            'registered',
            'safari',
            'sticky-note',
            'sticky-note-o',
            'television',
            'trademark',
            'tripadvisor',
            'tv',
            'vimeo',
            'wikipedia-w',
            'y-combinator',
            'yc',
            'adjust',
            'anchor',
            'archive',
            'area-chart',
            'arrows',
            'arrows-h',
            'arrows-v',
            'asterisk',
            'at',
            'automobile',
            'balance-scale',
            'ban',
            'bank',
            'bar-chart',
            'bar-chart-o',
            'barcode',
            'bars',
            'battery-0',
            'battery-1',
            'battery-2',
            'battery-3',
            'battery-4',
            'battery-empty',
            'battery-full',
            'battery-half',
            'battery-quarter',
            'battery-three-quarters',
            'bed',
            'beer',
            'bell',
            'bell-o',
            'bell-slash',
            'bell-slash-o',
            'bicycle',
            'binoculars',
            'birthday-cake',
            'bolt',
            'bomb',
            'book',
            'bookmark',
            'bookmark-o',
            'briefcase',
            'bug',
            'building',
            'building-o',
            'bullhorn',
            'bullseye',
            'bus',
            'cab',
            'calculator',
            'calendar',
            'calendar-check-o',
            'calendar-minus-o',
            'calendar-o',
            'calendar-plus-o',
            'calendar-times-o',
            'camera',
            'camera-retro',
            'car',
            'caret-square-o-down',
            'caret-square-o-left',
            'caret-square-o-right',
            'caret-square-o-up',
            'cart-arrow-down',
            'cart-plus',
            'cc',
            'certificate',
            'check',
            'check-circle',
            'check-circle-o',
            'check-square',
            'check-square-o',
            'child',
            'circle',
            'circle-o',
            'circle-o-notch',
            'circle-thin',
            'clock-o',
            'clone',
            'close',
            'cloud',
            'cloud-download',
            'cloud-upload',
            'code',
            'code-fork',
            'coffee',
            'cog',
            'cogs',
            'comment',
            'comment-o',
            'commenting',
            'commenting-o',
            'comments',
            'comments-o',
            'compass',
            'copyright',
            'creative-commons',
            'credit-card',
            'crop',
            'crosshairs',
            'cube',
            'cubes',
            'cutlery',
            'dashboard',
            'database',
            'desktop',
            'diamond',
            'dot-circle-o',
            'download',
            'edit',
            'ellipsis-h',
            'ellipsis-v',
            'envelope',
            'envelope-o',
            'envelope-square',
            'eraser',
            'exchange',
            'exclamation',
            'exclamation-circle',
            'exclamation-triangle',
            'external-link',
            'external-link-square',
            'eye',
            'eye-slash',
            'eyedropper',
            'fax',
            'feed',
            'female',
            'fighter-jet',
            'file-archive-o',
            'file-audio-o',
            'file-code-o',
            'file-excel-o',
            'file-image-o',
            'file-movie-o',
            'file-pdf-o',
            'file-photo-o',
            'file-picture-o',
            'file-powerpoint-o',
            'file-sound-o',
            'file-video-o',
            'file-word-o',
            'file-zip-o',
            'film',
            'filter',
            'fire',
            'fire-extinguisher',
            'flag',
            'flag-checkered',
            'flag-o',
            'flash',
            'flask',
            'folder',
            'folder-o',
            'folder-open',
            'folder-open-o',
            'frown-o',
            'futbol-o',
            'gamepad',
            'gavel',
            'gear',
            'gears',
            'gift',
            'glass',
            'globe',
            'graduation-cap',
            'group',
            'hand-grab-o',
            'hand-lizard-o',
            'hand-paper-o',
            'hand-peace-o',
            'hand-pointer-o',
            'hand-rock-o',
            'hand-scissors-o',
            'hand-spock-o',
            'hand-stop-o',
            'hdd-o',
            'headphones',
            'heart',
            'heart-o',
            'heartbeat',
            'history',
            'home',
            'hotel',
            'hourglass',
            'hourglass-1',
            'hourglass-2',
            'hourglass-3',
            'hourglass-end',
            'hourglass-half',
            'hourglass-o',
            'hourglass-start',
            'i-cursor',
            'image',
            'inbox',
            'industry',
            'info',
            'info-circle',
            'institution',
            'key',
            'keyboard-o',
            'language',
            'laptop',
            'leaf',
            'legal',
            'lemon-o',
            'level-down',
            'level-up',
            'life-bouy',
            'life-buoy',
            'life-ring',
            'life-saver',
            'lightbulb-o',
            'line-chart',
            'location-arrow',
            'lock',
            'magic',
            'magnet',
            'mail-forward',
            'mail-reply',
            'mail-reply-all',
            'male',
            'map',
            'map-marker',
            'map-o',
            'map-pin',
            'map-signs',
            'meh-o',
            'microphone',
            'microphone-slash',
            'minus',
            'minus-circle',
            'minus-square',
            'minus-square-o',
            'mobile',
            'mobile-phone',
            'money',
            'moon-o',
            'mortar-board',
            'motorcycle',
            'mouse-pointer',
            'music',
            'navicon',
            'newspaper-o',
            'object-group',
            'object-ungroup',
            'paint-brush',
            'paper-plane',
            'paper-plane-o',
            'paw',
            'pencil',
            'pencil-square',
            'pencil-square-o',
            'phone',
            'phone-square',
            'photo',
            'picture-o',
            'pie-chart',
            'plane',
            'plug',
            'plus',
            'plus-circle',
            'plus-square',
            'plus-square-o',
            'power-off',
            'print',
            'puzzle-piece',
            'qrcode',
            'question',
            'question-circle',
            'quote-left',
            'quote-right',
            'random',
            'recycle',
            'refresh',
            'registered',
            'remove',
            'reorder',
            'reply',
            'reply-all',
            'retweet',
            'road',
            'rocket',
            'rss',
            'rss-square',
            'search',
            'search-minus',
            'search-plus',
            'send',
            'send-o',
            'server',
            'share',
            'share-alt',
            'share-alt-square',
            'share-square',
            'share-square-o',
            'shield',
            'ship',
            'shopping-cart',
            'sign-in',
            'sign-out',
            'signal',
            'sitemap',
            'sliders',
            'smile-o',
            'soccer-ball-o',
            'sort',
            'sort-alpha-asc',
            'sort-alpha-desc',
            'sort-amount-asc',
            'sort-amount-desc',
            'sort-asc',
            'sort-desc',
            'sort-down',
            'sort-numeric-asc',
            'sort-numeric-desc',
            'sort-up',
            'space-shuttle',
            'spinner',
            'spoon',
            'square',
            'square-o',
            'star',
            'star-half',
            'star-half-empty',
            'star-half-full',
            'star-half-o',
            'star-o',
            'sticky-note',
            'sticky-note-o',
            'street-view',
            'suitcase',
            'sun-o',
            'support',
            'tablet',
            'tachometer',
            'tag',
            'tags',
            'tasks',
            'taxi',
            'television',
            'terminal',
            'thumb-tack',
            'thumbs-down',
            'thumbs-o-down',
            'thumbs-o-up',
            'thumbs-up',
            'ticket',
            'times',
            'times-circle',
            'times-circle-o',
            'tint',
            'toggle-down',
            'toggle-left',
            'toggle-off',
            'toggle-on',
            'toggle-right',
            'toggle-up',
            'trademark',
            'trash',
            'trash-o',
            'tree',
            'trophy',
            'truck',
            'tty',
            'tv',
            'umbrella',
            'university',
            'unlock',
            'unlock-alt',
            'unsorted',
            'upload',
            'user',
            'user-plus',
            'user-secret',
            'user-times',
            'users',
            'video-camera',
            'volume-down',
            'volume-off',
            'volume-up',
            'warning',
            'wheelchair',
            'wifi',
            'wrench',
            'hand-grab-o',
            'hand-lizard-o',
            'hand-o-down',
            'hand-o-left',
            'hand-o-right',
            'hand-o-up',
            'hand-paper-o',
            'hand-peace-o',
            'hand-pointer-o',
            'hand-rock-o',
            'hand-scissors-o',
            'hand-spock-o',
            'hand-stop-o',
            'thumbs-down',
            'thumbs-o-down',
            'thumbs-o-up',
            'thumbs-up',
            'ambulance',
            'automobile',
            'bicycle',
            'bus',
            'cab',
            'car',
            'fighter-jet',
            'motorcycle',
            'plane',
            'rocket',
            'ship',
            'space-shuttle',
            'subway',
            'taxi',
            'train',
            'truck',
            'wheelchair',
            'genderless',
            'intersex',
            'mars',
            'mars-double',
            'mars-stroke',
            'mars-stroke-h',
            'mars-stroke-v',
            'mercury',
            'neuter',
            'transgender',
            'transgender-alt',
            'venus',
            'venus-double',
            'venus-mars',
            'file',
            'file-archive-o',
            'file-audio-o',
            'file-code-o',
            'file-excel-o',
            'file-image-o',
            'file-movie-o',
            'file-o',
            'file-pdf-o',
            'file-photo-o',
            'file-picture-o',
            'file-powerpoint-o',
            'file-sound-o',
            'file-text',
            'file-text-o',
            'file-video-o',
            'file-word-o',
            'file-zip-o',
            'circle-o-notch',
            'cog',
            'gear',
            'refresh',
            'spinner',
            'check-square',
            'check-square-o',
            'circle',
            'circle-o',
            'dot-circle-o',
            'minus-square',
            'minus-square-o',
            'plus-square',
            'plus-square-o',
            'square',
            'square-o',
            'cc-amex',
            'cc-diners-club',
            'cc-discover',
            'cc-jcb',
            'cc-mastercard',
            'cc-paypal',
            'cc-stripe',
            'cc-visa',
            'credit-card',
            'google-wallet',
            'paypal',
            'area-chart',
            'bar-chart',
            'bar-chart-o',
            'line-chart',
            'pie-chart',
            'bitcoin',
            'btc',
            'cny',
            'dollar',
            'eur',
            'euro',
            'gbp',
            'gg',
            'gg-circle',
            'ils',
            'inr',
            'jpy',
            'krw',
            'money',
            'rmb',
            'rouble',
            'rub',
            'ruble',
            'rupee',
            'shekel',
            'sheqel',
            'try',
            'turkish-lira',
            'usd',
            'won',
            'yen',
            'align-center',
            'align-justify',
            'align-left',
            'align-right',
            'bold',
            'chain',
            'chain-broken',
            'clipboard',
            'columns',
            'copy',
            'cut',
            'dedent',
            'eraser',
            'file',
            'file-o',
            'file-text',
            'file-text-o',
            'files-o',
            'floppy-o',
            'font',
            'header',
            'indent',
            'italic',
            'link',
            'list',
            'list-alt',
            'list-ol',
            'list-ul',
            'outdent',
            'paperclip',
            'paragraph',
            'paste',
            'repeat',
            'rotate-left',
            'rotate-right',
            'save',
            'scissors',
            'strikethrough',
            'subscript',
            'superscript',
            'table',
            'text-height',
            'text-width',
            'th',
            'th-large',
            'th-list',
            'underline',
            'undo',
            'unlink',
            'angle-double-down',
            'angle-double-left',
            'angle-double-right',
            'angle-double-up',
            'angle-down',
            'angle-left',
            'angle-right',
            'angle-up',
            'arrow-circle-down',
            'arrow-circle-left',
            'arrow-circle-o-down',
            'arrow-circle-o-left',
            'arrow-circle-o-right',
            'arrow-circle-o-up',
            'arrow-circle-right',
            'arrow-circle-up',
            'arrow-down',
            'arrow-left',
            'arrow-right',
            'arrow-up',
            'arrows',
            'arrows-alt',
            'arrows-h',
            'arrows-v',
            'caret-down',
            'caret-left',
            'caret-right',
            'caret-square-o-down',
            'caret-square-o-left',
            'caret-square-o-right',
            'caret-square-o-up',
            'caret-up',
            'chevron-circle-down',
            'chevron-circle-left',
            'chevron-circle-right',
            'chevron-circle-up',
            'chevron-down',
            'chevron-left',
            'chevron-right',
            'chevron-up',
            'exchange',
            'hand-o-down',
            'hand-o-left',
            'hand-o-right',
            'hand-o-up',
            'long-arrow-down',
            'long-arrow-left',
            'long-arrow-right',
            'long-arrow-up',
            'toggle-down',
            'toggle-left',
            'toggle-right',
            'toggle-up',
            'arrows-alt',
            'backward',
            'compress',
            'eject',
            'expand',
            'fast-backward',
            'fast-forward',
            'forward',
            'pause',
            'play',
            'play-circle',
            'play-circle-o',
            'random',
            'step-backward',
            'step-forward',
            'stop',
            'youtube-play',
            '500px',
            'adn',
            'amazon',
            'android',
            'angellist',
            'apple',
            'behance',
            'behance-square',
            'bitbucket',
            'bitbucket-square',
            'bitcoin',
            'black-tie',
            'btc',
            'buysellads',
            'cc-amex',
            'cc-diners-club',
            'cc-discover',
            'cc-jcb',
            'cc-mastercard',
            'cc-paypal',
            'cc-stripe',
            'cc-visa',
            'chrome',
            'codepen',
            'connectdevelop',
            'contao',
            'css3',
            'dashcube',
            'delicious',
            'deviantart',
            'digg',
            'dribbble',
            'dropbox',
            'drupal',
            'empire',
            'expeditedssl',
            'facebook',
            'facebook-f',
            'facebook-official',
            'facebook-square',
            'firefox',
            'flickr',
            'fonticons',
            'forumbee',
            'foursquare',
            'ge',
            'get-pocket',
            'gg',
            'gg-circle',
            'git',
            'git-square',
            'github',
            'github-alt',
            'github-square',
            'gittip',
            'google',
            'google-plus',
            'google-plus-square',
            'google-wallet',
            'gratipay',
            'hacker-news',
            'houzz',
            'html5',
            'instagram',
            'internet-explorer',
            'ioxhost',
            'joomla',
            'jsfiddle',
            'lastfm',
            'lastfm-square',
            'leanpub',
            'linkedin',
            'linkedin-square',
            'linux',
            'maxcdn',
            'meanpath',
            'medium',
            'odnoklassniki',
            'odnoklassniki-square',
            'opencart',
            'openid',
            'opera',
            'optin-monster',
            'pagelines',
            'paypal',
            'pied-piper',
            'pied-piper-alt',
            'pinterest',
            'pinterest-p',
            'pinterest-square',
            'qq',
            'ra',
            'rebel',
            'reddit',
            'reddit-square',
            'renren',
            'safari',
            'sellsy',
            'share-alt',
            'share-alt-square',
            'shirtsinbulk',
            'simplybuilt',
            'skyatlas',
            'skype',
            'slack',
            'slideshare',
            'soundcloud',
            'spotify',
            'stack-exchange',
            'stack-overflow',
            'steam',
            'steam-square',
            'stumbleupon',
            'stumbleupon-circle',
            'tencent-weibo',
            'trello',
            'tripadvisor',
            'tumblr',
            'tumblr-square',
            'twitch',
            'twitter',
            'twitter-square',
            'viacoin',
            'vimeo',
            'vimeo-square',
            'vine',
            'vk',
            'wechat',
            'weibo',
            'weixin',
            'whatsapp',
            'wikipedia-w',
            'windows',
            'wordpress',
            'xing',
            'xing-square',
            'y-combinator',
            'y-combinator-square',
            'yahoo',
            'yc',
            'yc-square',
            'yelp',
            'youtube',
            'youtube-play',
            'youtube-square',
            'ambulance',
            'h-square',
            'heart',
            'heart-o',
            'heartbeat',
            'hospital-o',
            'medkit',
            'plus-square',
            'stethoscope',
            'user-md',
            'wheelchair',
        );
 
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select style="width:100%;" <?php $this->link(); ?> <?php $this->input_attrs(); ?>>
                    <?php //echo esc_textarea( $this->value() ); ?>
                    <?php
                        foreach ( $this->options as $option ) {
                        ?>
                            <option value = "<?php echo $option; ?>" <?php echo ( $option == $this->value() ? 'selected' : '' ); ?>><?php echo $option; ?></option>    
                        <?php
                        }
                    ?>
                </select>
			</label>
		<?php
		}
	}
endif;