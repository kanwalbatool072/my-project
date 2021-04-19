<template>

  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="group1"
        label="Group Name:"
        label-for="group-1"
        
      >
        <b-form-input
          id="group-1"
          v-model="form.groupname"
          type="text"
          placeholder="Enter Group Name"
          required
        ></b-form-input>
      </b-form-group>

      

     

      <b-form-group id="input-group-4" label="Add Users" label-for="tags-with-dropdown">
      <b-form-tags id="tags-with-dropdown" v-model="form.value" no-outer-focus class="mb-2">
        <template v-slot="{ tags, disabled, addTag, removeTag }">
          <ul v-if="tags.length > 0" class="list-inline d-inline-block mb-2">
            <li v-for="tag in tags" :key="tag" class="list-inline-item">
              <b-form-tag
                @remove="removeTag(tag)"
                :title="tag"
                :disabled="disabled"
                variant="info"
              >{{ tag }}</b-form-tag>
            </li>
          </ul>

          <b-dropdown size="sm" variant="outline-secondary" block menu-class="w-100">
            <template #button-content>
              <b-icon icon="tag-fill"></b-icon> Select user
            </template>
            <b-dropdown-form @submit.stop.prevent="() => {}">
              <b-form-group
                label="Search tags"
                label-for="tag-search-input"
                label-cols-md="auto"
                class="mb-0"
                label-size="sm"
                :description="searchDesc"
                :disabled="disabled"
              >
                <b-form-input
                  v-model="search"
                  id="tag-search-input"
                  type="search"
                  size="sm"
                  autocomplete="off"
                 ></b-form-input>
              </b-form-group>
            </b-dropdown-form>
            <b-dropdown-divider></b-dropdown-divider>
            <b-dropdown-item-button
              v-for="option in availableOptions"
              :key="option"
              @click="onOptionClick({ option, addTag })"
            >
              {{ option }}
            </b-dropdown-item-button>
            <b-dropdown-text v-if="availableOptions.length === 0">
              There are no tags available to select
            </b-dropdown-text>
          </b-dropdown>
        </template>
      </b-form-tags>
    </b-form-group>
    <br>
 <label >Select Permissions</label>
    <b-form-checkbox-group
     
      :options="checkbox"
      class="mb-3"
      v-model="form.checkbox" 
      value-field="item"
      text-field="name"
      disabled-field="notEnabled"
    ></b-form-checkbox-group>
    
<br><br>
      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    
  </div>
</template>

<script>
  export default {
    layout:"AdminLayout/index",
    data() {
      return {
        form: {
          groupname:'',
         value: [],
         checkbox: [],
        },
        checkbox: [
          { item: 'A', name: 'Option A' },
          { item: 'B', name: 'Option B' },
          { item: 'C', name: 'Option C' },
          { item:'D', name: 'Option D' }
        ]
        ,
        
         options: [ 'israr', 'nouman', 'arslan',  'ahmed'],
        show: true,
        
        search: '',
        value: []
      }
    },
    computed: {
      criteria() {
        // Compute the search criteria
        return this.search.trim().toLowerCase()
      },
      availableOptions() {
        const criteria = this.criteria
        // Filter out already selected options
        const options = this.options.filter(opt => this.form.value.indexOf(opt) === -1)
        if (criteria) {
          // Show only options that match criteria
          return options.filter(opt => opt.toLowerCase().indexOf(criteria) > -1);
        }
        // Show all options available
        return options
      },
      searchDesc() {
        if (this.criteria && this.availableOptions.length === 0) {
          return 'There are no tags matching your search criteria'
        }
        return ''
      }
    },
    methods: {
       onOptionClick({ option, addTag }) {
        addTag(option)
        this.search = ''
      },
      onSubmit(event) {
        event.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(event) {
        event.preventDefault()
        // Reset our form values
        this.form.groupname = ''
        this.form.lstname = ''
        this.form.Groups = null
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>