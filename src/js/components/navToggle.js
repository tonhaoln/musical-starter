document.addEventListener('DOMContentLoaded', function() {

  // Get the toggle button element by its ID
  const navToggle = document.getElementById('navToggle');
  
  // Get the site navigation element by its ID
  const siteHeader = document.getElementById('masthead');

  // Get the close navigation button element by its ID
  // const closeNav = document.getElementById('closeNav');

  // on click of the toggle button, remove the nav-collapse class from the site navigation element
  navToggle.addEventListener('click', function (e) {
    e.preventDefault();
    siteHeader.classList.toggle('nav-open');
  });

});


// Add dropdown Toggles to mobile menu
// TODO: Reassess this code and see if it can be improved / refactored to be more efficient / vanilla JS

// const navItems = $('#primary-menu li.menu-item-has-children');
// console.log(navItems);

// $(navItems).each(function (index, item) {
//   $(item)
//     .find('ul')
//     .before('<button class="expandMenu"><div><span class="iconify" data-icon="akar-icons:chevron-down" data-inline="false" style="color: #ffffff;"></span></div></button>');
//   $(item)
//     .find('.expandMenu')
//     .on('click', function () {
//       const clickParent = $(this).closest('li');
//       if ($(clickParent).hasClass('expanded-sub-nav')) {
//         $(clickParent).removeClass('expanded-sub-nav');
//         $(this).html('<div><span class="iconify" data-icon="akar-icons:chevron-down" data-inline="false" style="color: #ffffff;"></span></div>');
//       } else {
//         $(navItems).removeClass('expanded-sub-nav');
//         $('.expandMenu').html('<div><span class="iconify" data-icon="akar-icons:chevron-down" data-inline="false" style="color: #ffffff;"></span></div>');
//         $(clickParent).addClass('expanded-sub-nav');
//         $(this).html('<div><span class="iconify" data-icon="akar-icons:chevron-up" data-inline="false" style="color: #ffffff;"></span></div>');
//       }
//     });
// });