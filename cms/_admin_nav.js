export default {
  items: [{
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
          children: [{
                  name: 'Active groups',
                  url: '/groups',
              },
              {
                  name: 'Add groups',
                  url: '/addGroup',
              },

          ]
      },
      {
          name: 'Roles',
          url: '/manageRoles',
          icon: 'icon-user-following',
          //     children: [{
          //             name: 'Create roles',
          //             url: '/addRoles',
          //             icon: '',
          //         },
          //         {
          //             name: 'Manage roles',
          //             url: '/manageRoles',
          //             icon: '',
          //         }
          //     ]
      }
  ]
}