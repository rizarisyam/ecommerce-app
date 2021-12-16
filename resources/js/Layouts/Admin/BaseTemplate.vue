<template>
  <div class="flex flex-no-wrap h-screen">
    <!-- Sidebar starts -->
    <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
    <Sidebar @onSidebarHandler="sidebarHandler" />
    <!-- Sidebar ends -->

    <div class="w-full">
      <!-- Navigation starts -->
      <Navbar @onDropdownHanlder="dropdownHandler($event)" />
      <!-- Navigation ends -->
      <!-- Remove class [ h-64 ] when adding a card block -->
      <div
        class="
          container
          mx-auto
          py-5
          md:w-full
          w-11/12
          px-6
          h-full
          overflow-y-auto
        "
      >
        <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
        <div class="w-full h-full rounded flex justify-center">
          <!-- Place your content here -->
          <slot name="content" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "@/Components/Sidebar.vue";
import Navbar from "@/Components/Navbar.vue";

export default {
  name: "BaseTemplate",
  methods: {
    dropdownHandler(event) {
      let single = event.currentTarget.getElementsByTagName("ul")[0];
      single.classList.toggle("hidden");
    },
    sidebarHandler() {
      var sideBar = document.getElementById("mobile-nav");
      sideBar.classList.toggle("hidden");
    },
  },
  components: {
    Sidebar,
    Navbar,
  },
};
</script>
