export default {
  items: [
      {
        name: 'Users',
        icon: 'icon-user',
        children: [{
                name: 'Active users',
                url: '/user',
            },
            {
                name: 'Add users',
                url: '/adduser',
            },
        ]
      },
      {
        name: 'Groups',
        icon: 'icon-people',
        children: [
          {
            name: 'Active groups',
            url: '/user',
          },
          {
            name: 'Manage groups',
            url: '',
          }
        ]
      },
      {
        name: 'Roles',
        url: '',
        icon: 'icon-user-following',
        children: [
          {
            name: 'Create roles',
            url: '/user',
            icon: '',
          },
          {
            name: 'Manage roles',
            url: '',
            icon: '',
          }
        ]
      }
  ]
}