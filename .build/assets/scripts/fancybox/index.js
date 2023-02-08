import { Fancybox } from '@fancyapps/ui';
import '@fancyapps/ui/src/Fancybox/Fancybox.scss';

// Override default behaviour
Fancybox.defaults.infinite = 0;

Fancybox.bind(
	"a[href$='.jpg']:not([target]):not([download]), a[href$='.jpeg']:not([target]):not([download]), a[href$='.png']:not([target]):not([download]), a[href$='.gif']:not([target]):not([download]), a[href$='.svg']:not([target]):not([download]), a[href$='.webp']:not([target]):not([download])",
	{
		groupAll: true,
	}
);
