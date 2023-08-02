<script>
    export let students;
    console.log(students);

    import axios from 'axios';
    import { Router, Route ,Link } from "svelte-routing";    
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    let currentpage=1;
    let sid=0;
    function nextpage()
    {
        if(currentpage<countPage())
        {
            currentpage+=1;
        }
    }

    function previouspage()
    {
        if(currentpage>1)
        {
             currentpage-=1;
        }
    }

    function countPage()
    {
        return Math.ceil(students.length/10);
    }

    function searchpage(page)
    {
        if(page>=1 && page<=countPage);
    }

    function currentpagedata()
    {
        const start = (currentPage - 1) * 10;
        const end = start + 10;
        return students.slice(start, end);
    }
    const createStudentRoute = '/students/create.svelte';
    export let studentscreate;
    function deleteStudent(sid)
    {
        console.log("delte", {sid}); 
        axios.post('/students/deletedata', {sid})
        .then((response) => {
            console.log('Form submitted successfully!', response.data);
        })
        .catch((error) => {
            console.error('Error submitting form:', error);
        });
    }
    function updateStudent(sid)
    {
        console.log("update student", sid);
    }
</script>

<h1>Hello Pranali </h1>
<a href="students/create"
    as="button"
    class="button"
>
  Add Student
</a>
<table>
    <tr>
        <th>Student Roll No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
  </tr>
  {#each students as student}
    <tr>
        <td>{student.id}</td>
        <td>{student.name}</td>
        <td>{student.email}</td>
        <td>{student.address}</td>
        <td>{student.phone_number}</td>
        <td>
          <button type="button" class="add-student-button" on:click={() => deleteStudent(student.id)}>delete</button>
          <button type="button" class="add-student-button" on:click={() => updateStudent(student.id)}>update</button>
        </td>
    </tr>
  {/each}
</table>

<style>
    table, th, td {
    border: 1px solid;
    }

    .add-student-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
  }

    .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
  }
</style>