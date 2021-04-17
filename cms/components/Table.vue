<template>
  <b-card>
    <b-table
      :hover="hover"
      :striped="striped"
      :bordered="bordered"
      :small="small"
      :fixed="fixed"
      responsive="sm"
      :items="tabelData"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
    >
      <template slot="status" slot-scope="data">
        <b-badge :variant="getBadge(data.item.status)">{{
          data.item.status
        }}</b-badge>
      </template>
    </b-table>
    <nav>
      <b-pagination
        :total-rows="getRowCount(tabelData)"
        :per-page="perPage"
        v-model="currentPage"
        prev-text="Prev"
        next-text="Next"
        hide-goto-end-buttons
      />
    </nav>
  </b-card>
</template>

<script>
/**
 * Randomize array element order in-place.
 * Using Durstenfeld shuffle algorithm.
 */
// const shuffleArray = array => {
//   for (let i = array.length - 1; i > 0; i--) {
//     let j = Math.floor(Math.random() * (i + 1));
//     let temp = array[i];
//     array[i] = array[j];
//     array[j] = temp;
//   }
//   return array;
// };

export default {
  name: "c-table",
  props: {
    caption: {
      type: String,
      default: "Table"
    },
    hover: {
      type: Boolean,
      default: false
    },
    striped: {
      type: Boolean,
      default: false
    },
    bordered: {
      type: Boolean,
      default: false
    },
    small: {
      type: Boolean,
      default: false
    },
    fixed: {
      type: Boolean,
      default: false
    },
    tabelData: {
      type: Array,
      default: false
    },
    fields: {
      type: Array,
      default: false
    }
  },
  data: () => {
    return {
      currentPage: 1,
      perPage: 5,
      totalRows: 0
    };
  },
  methods: {
    getBadge(status) {
      return status === "Active"
        ? "success"
        : status === "Inactive"
        ? "secondary"
        : status === "Pending"
        ? "warning"
        : status === "Banned"
        ? "danger"
        : "primary";
    },
    getRowCount(items) {
      return items.length;
    }
  }
};
</script>
