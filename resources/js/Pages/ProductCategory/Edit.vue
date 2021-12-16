<template>
  <base-template>
    <template #content>
      <div
        class="
          bg-white
          shadow-md
          border border-gray-200
          rounded-lg
          max-w-lg
          h-auto
          p-4
          sm:p-6
          lg:p-8
          dark:bg-gray-800 dark:border-gray-700
        "
      >
        <form class="space-y-6" @submit.prevent="updateCategory">
          <h3 class="text-xl font-medium text-gray-900 dark:text-white">
            Category Name
          </h3>
          <div>
            <label
              for="name"
              class="
                text-sm
                font-medium
                text-gray-900
                block
                mb-2
                dark:text-gray-300
              "
              >Name</label
            >
            <input
              v-model="productCat.name"
              type="text"
              name=""
              id="name"
              class="
                bg-gray-50
                border border-gray-300
                text-gray-900
                sm:text-sm
                rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                block
                w-full
                p-2.5
                dark:bg-gray-600
                dark:border-gray-500
                dark:placeholder-gray-400
                dark:text-white
              "
              placeholder="category name"
            />
            <div v-if="errors.name" class="my-2 border-2 border-red-600">
              {{ errors.name }}
            </div>
          </div>
          <div>
            <label
              for="desc"
              class="
                text-sm
                font-medium
                text-gray-900
                block
                mb-2
                dark:text-gray-300
              "
              >Description</label
            >

            <ckeditor :editor="editor" v-model="productCat.desc"></ckeditor>

            <!-- <textarea
                v-model="productCat.desc"
                name=""
                id=""
                cols="30"
                rows="10"
                class="w-full border border-gray-400"
              ></textarea> -->
            <Alert v-if="errors.desc">
              <template #error>
                {{ errors.desc }}
              </template>
            </Alert>
          </div>

          <button
            type="submit"
            class="
              w-full
              text-white
              bg-blue-700
              hover:bg-blue-800
              focus:ring-4 focus:ring-blue-300
              font-medium
              rounded-lg
              text-sm
              px-5
              py-2.5
              text-center
              dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
            "
          >
            Submit
          </button>
        </form>
      </div>
    </template>
  </base-template>
</template>

<script>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

import BaseTemplate from "@/Layouts/Admin/BaseTemplate.vue";
import Card from "@/Components/Card.vue";
import Button from "@/Components/Button.vue";
import Alert from "@/Components/Alert.vue";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  name: "Create",
  props: {
    errors: Object,
    prodCat: Object,
  },
  data() {
    return {
      editor: ClassicEditor,
    };
  },
  setup(props) {
    //   product category
    const productCat = reactive({
      id: props.prodCat.id,
      name: props.prodCat.name,
      desc: props.prodCat.desc,
    });

    const updateCategory = () => {
      let name = productCat.name;
      let desc = productCat.desc;

      Inertia.put(route("product-categories.update", productCat.id), {
        name,
        desc,
      });
    };

    return {
      productCat,
      updateCategory,
    };
  },
  components: {
    BaseTemplate,
    Card,
    Button,
    Alert,
    ckeditor: CKEditor.component,
  },
};
</script>
