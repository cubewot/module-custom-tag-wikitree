<?php

/**
 * Custom tag module for WikiTree.
 */

declare(strict_types=1);

namespace ckcWikiTree;

use Fisharebest\Webtrees\Elements\AbstractExternalLink;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\IndividualMetadataModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Registry;

/**
 * Class ModuleCustomTagsckc
 * 
 * Dieses Modul registriert das _WIKITREE-Tag im GEDCOM-Standard von webtrees.
 * Erweitert die Seitenleiste "Zusätzliche Information" um das _WIKITREE-Tag.
 * Über HANDLED_FACTS beansprucht die Seitenleiste das Tag; der Reiter
 * "Tatsachen und Ereignisse" blendet es dadurch automatisch aus.
 */
class ModuleCustomTagsckc extends IndividualMetadataModule implements ModuleCustomInterface
{
    use ModuleCustomTrait;
	protected const array HANDLED_FACTS = [...parent::HANDLED_FACTS, '_WIKITREE'];

    public function title(): string
	{
    return I18N::translate('Extra information');
	}

	public function description(): string
	{
    return 'Seitenleiste „Zusätzliche Information“ inkl. WikiTree-ID. Ersetzt die Kern-Seitenleiste.';
	}
    public function customModuleAuthorName(): string
    {
        return 'Christian Kube';
    }

    public function customModuleVersion(): string
    {
        return '2.0.0'; 
    }

	public function boot(): void
	{
    $elementFactory = Registry::elementFactory();

    $elementFactory->registerTags([
        'INDI:_WIKITREE' => new class (I18N::translate('WikiTree ID')) extends AbstractExternalLink {
            protected const string EXTERNAL_URL = 'https://www.wikitree.com/wiki/{ID}';
        },
    ]);

    $elementFactory->registerSubTags([
        'INDI' => [['_WIKITREE', '0:1']],
    ]);
	}
}
