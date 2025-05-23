<?php
/**
 * @defgroup Templates Templates
 * @file
 * @ingroup Templates
 */

namespace MediaWiki\Extension\Collection\Templates;

use MediaWiki\Skin\QuickTemplate;
use MediaWiki\Skin\SkinComponentUtils;

/**
 * HTML template for Special:Book/save_collection/ when overwriting an exisiting collection
 *
 * @ingroup Templates
 */
class CollectionSaveOverwriteTemplate extends QuickTemplate {
	public function execute() {
		?>

		<h2><?php $this->msg( 'coll-overwrite_title' ) ?></h2>

		<?php echo wfMessage( 'coll-overwrite_text', $this->data['title']->getPrefixedText() )->parseAsBlock(); ?>

		<form action="<?php echo htmlspecialchars( SkinComponentUtils::makeSpecialUrl( 'Book' ) ) ?>" method="post">
			<input name="overwrite" type="submit" value="<?php $this->msg( 'coll-yes' ) ?>" />
			<input name="abort" type="submit" value="<?php $this->msg( 'coll-no' ) ?>" />
			<input name="pcollname" type="hidden" value="<?php echo htmlspecialchars( $this->data['pcollname'] ) ?>" />
			<input name="ccollname" type="hidden" value="<?php echo htmlspecialchars( $this->data['ccollname'] ) ?>" />
			<input name="colltype" type="hidden" value="<?php echo htmlspecialchars( $this->data['colltype'] ) ?>" />
			<input name="token" type="hidden" value="<?php echo htmlspecialchars( $this->getSkin()->getUser()->getEditToken() ) ?>" />
			<input name="bookcmd" type="hidden" value="save_collection" />
		</form>

		<?php
	}
}
