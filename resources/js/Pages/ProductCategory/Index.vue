<template>
  <base-template>
    <template #content>
      <Table @onShowModal="onShowModal">
        <template #header>
          <header
            class="px-5 py-4 border-b border-gray-100 flex justify-between"
          >
            <h2 class="font-semibold text-gray-800">Product Category</h2>
            <Link :href="route('product-categories.create')">
              <Button class="px-4 py-2">Add</Button>
            </Link>
          </header>
        </template>
        <template #thead>
          <th class="p-2 whitespace-nowrap">
            <div class="font-semibold text-left">Nomer</div>
          </th>
          <th class="p-2 whitespace-nowrap">
            <div class="font-semibold text-left">Name</div>
          </th>
          <th class="p-2 whitespace-nowrap">
            <div class="font-semibold text-left">Desc</div>
          </th>
          <th class="p-2 whitespace-nowrap">
            <div class="font-semibold text-left">Action</div>
          </th>
        </template>

        <template #tbody>
          <tr v-for="(value, index) in productCategories" :key="value.id">
            <td class="p-2 whitespace-nowrap">
              <div class="flex items-center">
                <div class="font-semibold text-gray-800">
                  {{ (index += 1) }}
                </div>
              </div>
            </td>
            <td class="p-2 whitespace-nowrap">
              <div class="flex items-center">
                <div class="font-medium text-gray-800">{{ value.name }}</div>
              </div>
            </td>
            <td class="p-2 whitespace-nowrap">
              <div class="text-left" v-html="value.desc"></div>
            </td>
            <td class="p-2 flex justify-start">
              <Link :href="route('product-categories.show', { id: value.id })"
                ><show-vue
              /></Link>
              <Link :href="route('product-categories.edit', { id: value.id })">
                <edit-vue
              /></Link>
              <Link
                :href="route('product-categories.destroy', { id: value.id })"
                ><delete-vue
              /></Link>
            </td>
          </tr>
        </template>
      </Table>
    </template>
  </base-template>

  <modal v-show="isModalVisible" @close="closeModal"></modal>
</template>


<script>
import BaseTemplate from "@/Layouts/Admin/BaseTemplate.vue";
import Table from "@/Components/Table.vue";
import Card from "@/Components/Card.vue";
import Modal from "@/Components/Modal.vue";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";

// Components Actions
import ShowVue from "@/Components/Action/Show.vue";
import EditVue from "@/Components/Action/Edit.vue";
import DeleteVue from "@/Components/Action/Delete.vue";

export default {
  data() {
    return {
      isModalVisible: false,
    };
  },
  props: {
    productCategories: Array,
  },
  methods: {
    onShowModal() {
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
    },
  },
  components: {
    BaseTemplate,
    Table,
    Card,
    Modal,
    Button,
    Link,
    ShowVue,
    EditVue,
    DeleteVue,
  },
  mounted() {},
};
</script>
