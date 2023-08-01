<script>
  import axios from 'axios';
  import 'bootstrap/dist/css/bootstrap.min.css';
  import 'bootstrap/dist/js/bootstrap.bundle.min.js';

  export let classesid;

  let formData = {
    name: '',
    email: '',
    address: '',
    phone_number: '',
    class_id: '',
    section_id: '',
  };

  let errors = {};

  function submit() {
    // Reset previous errors
    errors = {};

    if (!formData.name) {
      errors.name = "Name is required.";
    }

  
    if (Object.keys(errors).length > 0) {
      return;
    }

    axios.post('/students/savedata', formData)
      .then((response) => {
        console.log('Form submitted successfully!', response.data);
      })
      .catch((error) => {
        console.error('Error submitting form:', error);
      });
  }
</script>

<div class="container mt-4">
  <h2> Student Form </h2>
  <form on:submit|preventDefault={submit}>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" bind:value={formData.name} class="form-control"/><br>
      {#if errors.name}
        <div class="text-red-500">{errors.name}</div>
      {/if}
    </div>
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="text" bind:value={formData.email} class="form-control"/>
      {#if errors.email}
        <div class="form-error">{errors.email}</div>
      {/if}
    </div><br>
    <div class="form-group">
      <label for="phone_number">Phone Number: </label>
      <input type="text" bind:value={formData.phone_number} class="form-control"/>
      {#if errors.phone_number}
        <div class="form-error">{errors.phone_number}</div>
      {/if}
    </div>
    <div class="form-group">
      <label for="address">Address: </label>
      <input type="text" bind:value={formData.address} class="form-control"/>
      {#if errors.address}
        <div class="form-error">{errors.address}</div>
      {/if}
    </div><br>

    <label for="class_id">Class Id</label>
    <select id="class_id" bind:value={formData.class_id}>
      <option value="">Select a Class</option>
      {#each classesid as classe}
        <option value={classe.id}>
          {classe.name}
        </option>
      {/each}
    </select><br><br>

    <label for="section_id">Section Id</label>
    <select id="section_id" bind:value={formData.section_id}>
      <option value="">Select a Section</option>
      <option value="1">Section A</option>
      <option value="10">Section B</option>
    </select><br><br>

    <button type="submit" class="form-control">Submit</button>
  </form>
</div>
