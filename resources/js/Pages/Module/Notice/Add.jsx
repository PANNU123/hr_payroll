import React, { useState } from "react";
import MainLayout from "../../Layout/Mainlayout";
import { Link, router, usePage } from "@inertiajs/react";
import ReactQuill from "react-quill";
import "react-quill/dist/quill.snow.css";
import FlashMessage from "../../Component/FlashMessage.jsx";

function Add({ group_company_list }) {
    const {  errors,flash } = usePage().props;
    const [values, setValues] = useState({
        notice_date: "",
        expiry_date: "",
        title:"",
        description:"",
        sender:"",
        type:"",
        confidentiality:"",
        receiver:"",
        file_path:""
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = key === 'file_path' ? e.target.files[0] : e.target.value;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }
    function handleSubmit(e) {
        e.preventDefault();

        // const formData = new FormData();
        // formData.append('notice_date', values.notice_date);
        // formData.append('expiry_date', values.expiry_date);
        // formData.append('title', values.title);
        // formData.append('description', values.description);
        // formData.append('sender', values.sender);
        // formData.append('type', values.type);
        // formData.append('confidentiality', values.confidentiality);
        // formData.append('receiver', values.receiver);
        // formData.append('file_path', values.file_path);

        console.log(values)
        router.post("/admin/notice/store", values);
        // setValues({
        //     notice_date: "",
        //     expiry_date: "",
        //     title:"",
        //     description:"",
        //     sender:"",
        //     type:"",
        //     confidentiality:"",
        //     receiver:"",
        //     file_path:""
        // })
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
                            Notice
                        </Link>
                    </li>
                    <li className="before:content-['/'] ltr:before:mr-2 rtl:before:ml-2">
                        <span>Add</span>
                    </li>
                </ul>
            </div>
            <div className="pt-5 grid lg:grid-cols-1 grid-cols-1 gap-6">
                <div className="panel" id="forms_grid">
                    <div className="flex items-center justify-between mb-5">
                        <h5 className="font-semibold text-lg dark:text-white-light">
                            Notice
                        </h5>
                    </div>
                    <div className="mb-5">
                        <form
                            className="space-y-5"
                            onSubmit={handleSubmit}
                            method="post"
                            encType="multipart/form-data"
                        >
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label htmlFor="title">Title</label>
                                    <input
                                        id="title"
                                        type="text"
                                        placeholder="Enter Title"
                                        className="form-input"
                                        value={values.title}
                                        onChange={handleChange}
                                    />
                                    {errors.title && (
                                        <div className="text-red-600 text-[14px]">
                                            {errors.title}
                                        </div>
                                    )}
                                </div>
                                <div>
                                    <label htmlFor="sender">Sender</label>
                                    <input
                                        id="sender"
                                        type="text"
                                        placeholder="Enter Sender"
                                        className="form-input"
                                        value={values.sender}
                                        onChange={handleChange}
                                    />
                                    {errors.sender && (
                                        <div className="text-red-600 text-[14px]">
                                            {errors.sender}
                                        </div>
                                    )}
                                </div>
                            </div>
                            <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label htmlFor="type">
                                        Type
                                    </label>
                                    <select
                                        id="type"
                                        className="form-select text-white-dark"
                                        value={values.type}
                                        onChange={handleChange}
                                    >
                                        <option>Choose...</option>
                                        <option value="D">Display</option>
                                        <option value="E">Email</option>
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="confidentiality">
                                        Confidentiality
                                    </label>
                                    <select
                                        id="confidentiality"
                                        className="form-select text-white-dark"
                                        value={values.confidentiality}
                                        onChange={handleChange}
                                    >
                                        <option>Choose...</option>
                                        <option value="P">Public</option>
                                        <option value="C">Confidential</option>
                                    </select>
                                </div>
                                <div>
                                    <label htmlFor="receiver">
                                        Receiver
                                    </label>
                                    <select
                                        id="receiver"
                                        className="form-select text-white-dark"
                                        value={values.receiver}
                                        onChange={handleChange}
                                    >
                                        <option>Choose...</option>
                                        <option value="A">All</option>
                                        <option value="P">Person</option>
                                        <option value="D">Department</option>
                                    </select>
                                </div>
                            </div>
                            <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label htmlFor="notice_date">Notice Date</label>
                                    <input
                                        id="notice_date"
                                        type="date"
                                        placeholder="Enter Sender"
                                        className="form-input"
                                        value={values.notice_date}
                                        onChange={handleChange}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="expiry_date">Expiry Date</label>
                                    <input
                                        id="expiry_date"
                                        type="date"
                                        placeholder="Enter Sender"
                                        className="form-input"
                                        value={values.expiry_date}
                                        onChange={handleChange}
                                    />
                                </div>
                                <div>
                                    <label htmlFor="file_path">File Path</label>
                                    <input
                                        id="file_path"
                                        type="file"
                                        className="form-input"
                                        onChange={handleChange}
                                    />
                                </div>
                            </div>
                            <div className="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                <div>
                                    <label htmlFor="gridAddress1">Description</label>

                                    <textarea
                                        id="description"
                                        placeholder="Enter Description"
                                        className="form-input"
                                        value={values.description}
                                        onChange={handleChange}
                                    ></textarea>
                                </div>
                            </div>
                            <button
                                type="submit"
                                className="btn btn-primary !mt-6"
                            >
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </>
    );
}

Add.layout = (page) => (
    <MainLayout children={page} title="HR || Add Notice" />
);

export default Add;
