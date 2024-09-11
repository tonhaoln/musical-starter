document.addEventListener("DOMContentLoaded", function () {

  const tabsContainers = document.querySelectorAll('.ehd-tabs');
  // Loop through each tabs container
  tabsContainers.forEach(tabsContainer => {
    const tabsList = tabsContainer.querySelector('ul.tabs-nav');
    const tabButtons = tabsList.querySelectorAll('a.tab-nav-link');
    const tabPanels = tabsContainer.querySelectorAll('.tabs__panels > article.block-tab');

    // accessibility
    tabsList.setAttribute('role', 'tablist');
    tabsList.querySelectorAll('li').forEach((tab, index) => {
      tab.setAttribute('role', 'presentation');
    });

    tabButtons.forEach((tab, index) => {
      tab.setAttribute('role', 'tab');
      if(index === 0 ){
        tab.setAttribute("aria-selected", "true");
      } else {
        tab.setAttribute("tabindex", "-1");
        tabPanels[index].setAttribute("hidden", "");
      }
    });

    tabPanels.forEach((panel) => {
      panel.setAttribute("role", "tabpanel");
      panel.setAttribute("tabindex", "0");
    });

    tabsContainer.addEventListener('click', function (e) {
      const clickedTab = e.target.closest('.tab-nav-link');
      if (!clickedTab) return;
      e.preventDefault();

      switchTab(clickedTab);
    });

    // Keyboard navigation to switch tabs
    tabsContainer.addEventListener('keydown', function (e) {
      switch (e.key) {
        case "ArrowLeft":
          moveLeftTab();
          break;
        case "ArrowRight":
          moveRightTab();
          break;
        case "Home":
          e.preventDefault();
          switchTab(tabButtons[0]);
          break;
        case "End":
          e.preventDefault();
          switchTab(tabButtons[tabButtons.length - 1]);
          break;
      }
    })

    function moveLeftTab(){
      const currentTab = document.activeElement
      if(!currentTab.parentElement.previousElementSibling){
        switchTab(tabButtons[tabButtons.length - 1]);
      }
      switchTab(currentTab.parentElement.previousElementSibling.querySelector("a"));
    }

    function moveRightTab(){
      const currentTab = document.activeElement
      if(!currentTab.parentElement.nextElementSibling){
        switchTab(tabButtons[0]);
      }
      switchTab(currentTab.parentElement.nextElementSibling.querySelector("a"));
    }

    function switchTab(newTab){
      const activePanelId = newTab.getAttribute('href');
      const activePanel = tabsContainer.querySelector(activePanelId);

      tabButtons.forEach((button) => {
        button.setAttribute("aria-selected", false);
        button.setAttribute("tabindex", "-1");
      });

      tabPanels.forEach((panel) =>{
        panel.setAttribute("hidden", true);
      });
      
      activePanel.removeAttribute("hidden");
      newTab.setAttribute("aria-selected", true);
      newTab.setAttribute("tabindex", "0");
      newTab.focus();
    }

  });
});