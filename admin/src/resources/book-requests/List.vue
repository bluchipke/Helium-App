<template>
  <base-material-card :icon="resource.icon" :title="title">
    <va-list :filters="filters" :include="['user', 'book']">
      <va-data-table :fields="fields"> </va-data-table>
    </va-list>
  </base-material-card>
</template>

<script>
export default {
  props: ["resource", "title"],
  data() {
    return {
      filters: [
        "title",
        "author",
        "isbn",
        { source: "return_date", type: "date" },
        "isbn",
        { source: "status", type: "select" },
      ],
      fields: [
        { 
          source: "book.isbn", 
          labelKey: 'ISBN',
          sortable: false,
          link: "show"
        },
        { 
          source: "book.title", 
          labelKey: "title",
          sortable: false 
          },
        // { 
        //   source: "author", 
        //   labelKey: "Author",
        //   type: "chip", 
        //   sortable: false 
        // },
        { 
          source: "status", 
          type: "select", 
          color: "orange", 
          sortable: true 
        },
        { source: "return_date", type: "date", sortable: true },
        { 
          source: "user.name", 
          labelKey: "Name",
          type: "reference" ,
          attributes: {
            reference: "users",
            text: "name",
            chip: true,
            color: "orange"
          },
        },
        // { source: "authorized_by", type: "select", sortable: true },
      ],
    };
  },
};
</script>
