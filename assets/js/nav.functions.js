let state = 'minimized';

function toggleNav() {
  const navElement = document.querySelector('nav.menu');
  const anchorElements = document.querySelectorAll('nav.menu a');

  if (state === 'minimized') {
    navElement.classList.remove('minimized');
    navElement.classList.add('maximized');
    
    anchorElements.forEach(item => {
      item.classList.remove('minimized');
      item.classList.add('maximized');
    });

    state = 'maximized';

    return;
  }

  navElement.classList.remove('maximized');
  navElement.classList.add('minimized');  
  
  anchorElements.forEach(item => {
    item.classList.remove('maximized');
    item.classList.add('minimized');
  });

  state = 'minimized';

  return;
}