<script>
import { useForm } from '@inertiajs/svelte'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

export let classesid;
console.log(classesid); 
let form = useForm({
  name: null,
  email: null,
  address: null,
  phone_number: null,
  remember: false,
})

function submit() {
  $form.post('/login')
}

</script>


<div class="container mt-4">
  <h2> Stuent Form </h2>
  <form on:submit|preventDefault={submit}>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" bind:value={$form.name} class="form-control"/><br>
      {#if $form.errors.email}
        <div class="form-error">{$form.errors.name}</div>
      {/if}
    </div>
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="text" bind:value={$form.email} class="form-control"/>
      {#if $form.errors.email}
        <div class="form-error">{$form.errors.email}</div>
      {/if}
    </div><br>
    <div class="form-group">
      <label for="phone_number">Phone Nummber: </label>
      <input type="text" bind:value={$form.phone_number} class="form-control"/>
      {#if $form.errors.phone_number}
        <div class="form-error">{$form.errors.phone_number}</div>
      {/if}
    </div>
    <div class="form-group">
      <label for="address">Address: </label>
      <input type="text" bind:value={$form.address} class="form-control"/>
      {#if $form.errors.address}
        <div class="form-error">{$form.errors.address}</div>
      {/if}
    </div><br>

    <label for="class_id">Class Id</label>
    <select id="class_id" bind:value={$form.class_id}>
      <option value="">Select a Class</option>
      <option value="1">class 1</option>
      <option value="2">class 2</option>
    </select><br><br>

    <label for="section_id">Section Id</label>
    <select id="section_id" bind:value={$form.section_id}>
      <option value="">Select a Section</option>
      <option value="1">Section A</option>
      <option value="2">Section B</option>
    </select><br><br>

    <button type="submit" disabled={$form.processing} class="form-control">Submit</button>
  </form>
</div>