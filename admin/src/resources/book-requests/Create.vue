<template>
  <va-create-layout>
    <book-requests-form :title="title" :item="item"></book-requests-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
