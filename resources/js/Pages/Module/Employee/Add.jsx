import React, { useState } from "react";
import MainLayout from "../../Layout/Mainlayout";
import { Link, router, usePage } from "@inertiajs/react";
import ReactQuill from "react-quill";
import "react-quill/dist/quill.snow.css";
import FlashMessage from "../../Component/FlashMessage.jsx";
import { useForm } from "react-hook-form";
import axios from 'axios'; // Import Axios

function Add({companies,users,titles,religions,bangladesh,department,section,designation,working_status,banks,})
{
    const {  flash } = usePage().props;
    const { register, handleSubmit,formState: { errors } } = useForm();

    const [presentThana, setPresentThana] = useState([]);
    const [presentPostCode, setPresentPostCode] = useState();

    const [parmanentThana, setParmanentThana] = useState([]);
    const [parmanentPostCode, setParmanentPostCode] = useState();

    const [mailingThana, setMailingThana] = useState([]);
    const [mailingPostCode, setMailingPostCode] = useState();

    const presentDistrictSelect =  async (name) => {
        try {
            const response = await axios.get('/admin/get-thana/'+name);
            setPresentThana(response.data);
        } catch (error) {
            console.error(error);
        }
    };
    const presentThanaSelect =  async (name) => {
        try {
            const response = await axios.get('/admin/get-post-code/'+name);
            setPresentPostCode(response.data.post_code);
        } catch (error) {
            console.error(error);
        }
    };


    const parmanentDistrictSelect =  async (name) => {
        try {
            const response = await axios.get('/admin/get-thana/'+name);
            setParmanentThana(response.data);
        } catch (error) {
            console.error(error);
        }
    };
    const parmanentThanaSelect =  async (name) => {
        try {
            const response = await axios.get('/admin/get-post-code/'+name);
            setParmanentPostCode(response.data.post_code);
        } catch (error) {
            console.error(error);
        }
    };

    const mailingDistrictSelect =  async (name) => {
        try {
            const response = await axios.get('/admin/get-thana/'+name);
            setMailingThana(response.data);
        } catch (error) {
            console.error(error);
        }
    };
    const mailingThanaSelect =  async (name) => {
        try {
            const response = await axios.get('/admin/get-post-code/'+name);
            setMailingPostCode(response.data.post_code);
        } catch (error) {
            console.error(error);
        }
    };



    function onSubmit(data) {
        console.log(data);
        router.post("/admin/employee/store", data);
    }

    return (
        <>
            <FlashMessage flash={flash} />
            <div className="panel flex items-center overflow-x-auto whitespace-nowrap p-3 ">
                <div className="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-3.5 w-3.5"
                    >
                        <path
                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                            stroke="currentColor"
                            strokeWidth="1.5"
                        />
                        <path
                            opacity="0.5"
                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                            stroke="currentColor"
                            strokeWidth="1.5"
                            strokeLinecap="round"
                        />
                    </svg>
                </div>
                <ul className="flex space-x-2 rtl:space-x-reverse">
                    <li>
                        <Link href="#" className="text-primary hover:underline">
                            Title
                        </Link>
                    </li>
                    <li className="before:content-['/'] ltr:before:mr-2 rtl:before:ml-2">
                        <span>Add</span>
                    </li>
                </ul>
            </div>
            <div className="pt-5 grid lg:grid-cols-1 grid-cols-1 gap-6">
                <form className="space-y-5" onSubmit={handleSubmit(onSubmit)} method="post" >
                    <div className="panel" id="forms_grid">
                            {/*Employee credentials*/}
                        <div className="flex items-center justify-between mb-5">
                            <h5 className="font-semibold text-lg dark:text-white-light">
                                Employee Credential Information
                            </h5>
                        </div>
                        <div className="mb-5">

                                <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div>
                                        <label htmlFor="name">First Name</label>
                                        <input
                                            type="text"
                                            className="form-input"
                                            placeholder="Enter First Name"
                                            {...register("first_name", { required: "First Name is required" })}
                                        />
                                        {errors.first_name && (
                                            <span className="text-red-600 text-[14px] pt-3">
                                                {errors.first_name.message}
                                            </span>
                                        )}
                                    </div>
                                    <div>
                                        <label htmlFor="name">Last Name</label>
                                        <input
                                            type="text"
                                            className="form-input"
                                            placeholder="Enter Last Name"
                                            {...register("last_name", { required: "Last Name is required" })}
                                        />
                                        {errors.last_name && (
                                            <span className="text-red-600 text-[14px] pt-3">
                                                {errors.last_name.message}
                                            </span>
                                        )}
                                    </div>
                                    <div>
                                        <label htmlFor="name">Email</label>
                                        <input
                                            type="email"
                                            className="form-input
                                         {`${errors.email && 'is-invalid'}`}"
                                            {...register("email",
                                                {
                                                required:"Email is required",
                                                pattern: { value: /\S+@\S+\.\S+/, message: 'Enter a valid email'}
                                                })} placeholder="name@example.com" />
                                        {errors.email && (
                                            <span className="text-red-600 text-[14px]">
                                                {errors.email.message}
                                            </span>
                                        )}
                                    </div>

                                </div>
                                <br/>
                                <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div>
                                        <label htmlFor="name">Machine User ID</label>
                                        <input
                                            type="number"
                                            className="form-input"
                                            placeholder="Enter Machine User ID"
                                            {...register("machine_user_id", { required: "Machine User ID is required" })}
                                        />
                                        {errors.machine_user_id && (
                                            <span className="text-red-600 text-[14px] pt-3">
                                                {errors.machine_user_id.message}
                                            </span>
                                        )}
                                    </div>
                                    <div>
                                        <label htmlFor="name">Mobile</label>
                                        <input
                                            type="text"
                                            className="form-input"
                                            placeholder="Enter Mobile Number"
                                            {...register("mobile")}
                                        />
                                    </div>
                                    <div>
                                        <label htmlFor="type">
                                            Gender
                                        </label>
                                        <select
                                            className="form-select text-white-dark"
                                            {...register("gender")}
                                        >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                </div>
                                <br/>
                                <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div>
                                        <label htmlFor="date">Date Of Birth ID</label>
                                        <input
                                            type="date"
                                            className="form-input"
                                            {...register("date_of_birth")}
                                        />
                                    </div>
                                    <div>
                                        <label htmlFor="avatar">Avatar</label>
                                        <input
                                            type="file"
                                            className="form-input"
                                            {...register("avatar")}
                                        />
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div className="panel" id="forms_grid">
                        {/*Employee credentials*/}
                        <div className="flex items-center justify-between mb-5">
                            <h5 className="font-semibold text-lg dark:text-white-light">
                                Employee Personal Information
                            </h5>
                        </div>
                        <div className="mb-5">
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                <div>
                                    <label htmlFor="company_id">
                                        Company Name
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("company_id")}
                                    >
                                        {companies.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="company_id">
                                        Title
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("title_id")}
                                    >
                                        {titles.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="company_id">
                                        Religion
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("religion_id")}
                                    >
                                        {religions.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>

                                <div>
                                    <label htmlFor="name">Signature</label>
                                    <input
                                        type="file"
                                        className="form-input"
                                        {...register("signature")}
                                    />
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">

                                <div>
                                    <label htmlFor="name">Father Name</label>
                                    <input
                                        type="text"
                                        placeholder="First Name"
                                        className="form-input"
                                        {...register("father_name")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="name">Mother Name</label>
                                    <input
                                        type="text"
                                        placeholder="Mother Name"
                                        className="form-input"
                                        {...register("mother_name")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="name">Spouse Name</label>
                                    <input
                                        type="text"
                                        placeholder="Spouse Name"
                                        className="form-input"
                                        {...register("spouse_name")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="name">National Id</label>
                                    <input
                                        type="text"
                                        placeholder="National Id"
                                        className="form-input"
                                        {...register("national_id")}
                                    />
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">

                                <div>
                                    <label htmlFor="name">Present Address</label>
                                    <input
                                        type="text"
                                        placeholder="Present Address"
                                        className="form-input"
                                        {...register("pr_address")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Present District
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("pr_district")}
                                        onChange={(e) => presentDistrictSelect(e.target.value)}
                                    >
                                        {bangladesh.map((item) => (
                                            <option
                                                key={item.district}
                                                value={item.district}
                                            >
                                                {item.district}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Present Police Station
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("pr_police_station")}
                                        onChange={(e) => presentThanaSelect(e.target.value)}
                                    >
                                        {presentThana.map((item) => (
                                            <option
                                                key={item.thana + '-' + item.post_office}
                                                value={item.thana + '-' + item.post_office}
                                            >
                                                {item.thana + '-' + item.post_office}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Present Post Code
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Present Post Code"
                                        className="form-input"
                                        value={presentPostCode}
                                        {...register("pr_post_code")}
                                    />
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">

                                <div>
                                    <label htmlFor="name">Permanent Address</label>
                                    <input
                                        type="text"
                                        placeholder="Permanent Address"
                                        className="form-input"
                                        {...register("pm_address")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Permanent District
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("pm_district")}
                                        onChange={(e) => parmanentDistrictSelect(e.target.value)}
                                    >
                                        {bangladesh.map((item) => (
                                            <option
                                                key={item.district}
                                                value={item.district}
                                            >
                                                {item.district}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Permanent Police Station
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("pm_police_station")}
                                        onChange={(e) => parmanentThanaSelect(e.target.value)}

                                    >
                                        {parmanentThana.map((item) => (
                                            <option
                                                key={item.thana + '-' + item.post_office}
                                                value={item.thana + '-' + item.post_office}
                                            >
                                                {item.thana + '-' + item.post_office}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Permanent Post Code
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Permanent Post Code"
                                        className="form-input"
                                        value={parmanentPostCode}
                                        {...register("pm_post_code")}
                                    />
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">

                                <div>
                                    <label htmlFor="name">Mailing Address</label>
                                    <input
                                        type="text"
                                        placeholder="Mailing Address"
                                        className="form-input"
                                        {...register("m_address")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Mailing District
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("m_district")}
                                        onChange={(e) => mailingDistrictSelect(e.target.value)}
                                        >
                                        {bangladesh.map((item) => (
                                            <option
                                                key={item.district}
                                                value={item.district}
                                            >
                                                {item.district}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Mailing Police Station
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("m_police_station")}
                                        onChange={(e) => mailingThanaSelect(e.target.value)}
                                        >
                                        {mailingThana.map((item) => (
                                            <option
                                                key={item.thana + '-' + item.post_office}
                                                value={item.thana + '-' + item.post_office}
                                            >
                                                {item.thana + '-' + item.post_office}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Mailing Post Code
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Permanent Post Code"
                                        className="form-input"
                                        {...register("m_post_code")}
                                        value={mailingPostCode}
                                    />
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">

                                <div>
                                    <label htmlFor="name">Last Education</label>
                                    <input
                                        type="text"
                                        placeholder="Enter Last Education"
                                        className="form-input"
                                        {...register("last_education")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Blood Group Name
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("blood_group")}
                                    >
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="prof_speciality">Prof Speciality</label>
                                    <input
                                        type="text"
                                        placeholder="Prof Speciality"
                                        className="form-input"
                                        {...register("prof_speciality")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="type">
                                        Is Printed
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("is_printed")}
                                    >
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-1 gap-4">

                                <div>
                                    <label htmlFor="gridAddress1">Biography</label>

                                    <textarea
                                        placeholder="Biography"
                                        className="form-input"
                                        {...register("biography")}
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="panel" id="forms_grid">
                        {/*Employee credentials*/}
                        <div className="flex items-center justify-between mb-5">
                            <h5 className="font-semibold text-lg dark:text-white-light">
                                Employee Professional Information
                            </h5>
                        </div>
                        <div className="mb-5">
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                <div>
                                    <label htmlFor="company_id">
                                        Department
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("department_id")}
                                    >
                                        {department.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="section_id">
                                        Section
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("section_id")}
                                    >
                                        {section.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="designation_id">
                                        Designation
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("designation_id")}
                                    >
                                        {designation.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>

                                <div>
                                    <label htmlFor="working_status_id">
                                        Working Status
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("working_status_id")}
                                    >
                                        {working_status.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                <div>
                                    <label htmlFor="bank_id">
                                        Bank Name
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("bank_id")}
                                    >
                                        {banks.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="pf_no">Pf No</label>
                                    <input
                                        type="number"
                                        className="form-input"
                                        placeholder="Enter Pf No"
                                        {...register("pf_no")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="report_to">
                                        Report To
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("report_to")}
                                    >
                                        {users.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.first_name}
                                            </option>
                                        ))}
                                    </select>
                                </div>

                                <div>
                                    <label htmlFor="joining_date">Joining Date</label>
                                    <input
                                        type="date"
                                        className="form-input"
                                        {...register("joining_date")}
                                    />
                                </div>

                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label htmlFor="overtime">
                                        Overtime
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("overtime")}
                                    >
                                        <option value="1">Overtime Eligibility</option>
                                        <option value="0">Overtime Not Eligibility</option>
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="overtime_note">Overtime Note</label>
                                    <input
                                        type="text"
                                        className="form-input"
                                        placeholder="Enter Overtime Note"
                                        {...register("overtime_note")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="transport">
                                        Transport
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("transport")}
                                    >
                                        <option value="1">Transport Eligibility</option>
                                        <option value="0">Transport Not Eligibility</option>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">

                                <div>
                                    <label htmlFor="transport_note">Transport Note</label>
                                    <input
                                        type="text"
                                        className="form-input"
                                        placeholder="Enter Overtime Note"
                                        {...register("transport_note")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="pay_schale">
                                        Pay Schale
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("pay_schale")}
                                    >
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="pay_grade">Pay Grade</label>
                                    <input
                                        type="text"
                                        className="form-input"
                                        placeholder="Enter Overtime Note"
                                        {...register("pay_grade")}
                                    />
                                </div>
                            </div>
                            <br/>
                            <div className="grid grid-cols-1 sm:grid-cols-4 gap-4">

                                <div>
                                    <label htmlFor="bank_acc_no">Bank Acc No</label>
                                    <input
                                        type="text"
                                        className="form-input"
                                        placeholder="Enter Bank Acc No"
                                        {...register("bank_acc_no")}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="confirm_probation">
                                        Confirm Probation
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("confirm_probation")}
                                    >
                                        <option value="P">P</option>
                                        <option value="A">A</option>
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="confirm_period">
                                        Confirm Period
                                    </label>
                                    <select
                                        className="form-select text-white-dark"
                                        {...register("confirm_period")}
                                    >
                                        <option value="0">Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="name">Status Change Date</label>
                                    <input
                                        type="date"
                                        className="form-input"
                                        {...register("status_change_date")}
                                    />
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="submit" className="btn btn-primary !mt-6">Submit</button>
                </form>
            </div>
        </>
    );
}

Add.layout = (page) => (
    <MainLayout children={page} title="HR || Add Title" />
);

export default Add;
