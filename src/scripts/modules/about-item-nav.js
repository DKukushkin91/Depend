export const getActiveItem = () => {
	if(document.querySelector('.js-title-item')) {
		const items = document.querySelectorAll('.js-title-item');

		let sections = {};
		let i = 0;

		Array.prototype.forEach.call(items, e => {
			sections[e.id] = e.offsetTop;
		});

		window.addEventListener('scroll', () => {
			const scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

			for(i in sections) {
				if(sections[i] <= scrollPosition) {
					document.querySelector('.about-item__link--active').classList.remove('about-item__link--active');
					document.querySelector('a[href*='+ i +']').classList.add('about-item__link--active');
				}
			}
		})
	}
}
