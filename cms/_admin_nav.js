export default {
  items: [
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
        icon: '',
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
        ]
      }
  ]
}