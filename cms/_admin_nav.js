export default {
<<<<<<< Updated upstream
  items: [
  //   // {
  //   // name: 'Dashboard',
  //   // url: '/admin',
  //   // icon: 'icon-speedometer',
  //   // badge: {
  //   //   variant: 'primary',
  //   //   text: 'NEW'
  //   // }
  // },
  {
    name: 'Users',
    url: '',
    icon: 'icon-users',
    children: [
      {
        name: 'Active users',
        url: '/user',
        icon: 'icon-users'
      },
=======
    items: [
        //   // {
        //   // name: 'Dashboard',
        //   // url: '/admin',
        //   // icon: 'icon-speedometer',
        //   // badge: {
        //   //   variant: 'primary',
        //   //   text: 'NEW'
        //   // }
        // },
        {
            name: 'Users',
            url: '',
            icon: 'icon-users',
            children: [{
                    name: 'Active users',
                    url: '/user',
                    icon: 'icon-users'
                },
                {
                    name: 'Add user',
                    url: '/adduser',
                    icon: 'icon-users'
                },
            ]
        },
        {
            name: 'Groups',
            url: '',
            icon: 'icon-speedometer',
            children: [{
                    name: 'Active group',
                    url: '/user',
                    icon: 'icon-user',
                },
                {
                    name: 'Manage group',
                    url: '',
                    icon: 'icon-user',
                }

            ],
            badge: {
                variant: 'primary',
                text: 'NEW'
            }
        }
>>>>>>> Stashed changes
    ]
  },
  {
    name: 'Groups',
    url: '',
    icon: 'icon-speedometer',
    children: [
      {
        name: 'Active group',
        url: '/user',
        icon: 'icon-user',
      },
      {
        name: 'Manage group',
        url: '',
        icon: 'icon-user',
      }

    ],
    badge: {
      variant: 'primary',
      text: 'NEW'
    }
  }
  ]
}
