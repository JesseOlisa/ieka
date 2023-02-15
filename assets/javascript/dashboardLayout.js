const menuBtn = document.querySelector('.menu--btn');
const mobileSideBar = document.querySelector('.mobile-sidebar-links-container');

menuBtn.addEventListener('click', () => {
	if (!menuBtn.classList.contains('open')) {
		menuBtn.classList.add('open');
		mobileSideBar.style.transform = 'translateX(0)';
	} else {
		menuBtn.classList.remove('open');
		mobileSideBar.style.transform = 'translateX(-100%)';
	}
});
