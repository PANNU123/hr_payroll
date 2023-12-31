import React, { useState } from "react";
import MainLayout from "../../Layout/Mainlayout";
import { Link, router, usePage } from "@inertiajs/react";
import ReactQuill from "react-quill";
import "react-quill/dist/quill.snow.css";
import FlashMessage from "../../Component/FlashMessage.jsx";

function Edit({ result, group_company_list }) {
    const [groupID, setGroupID] = useState(result.group_company_id)


    const { errors,flash } = usePage().props;
    const [values, setValues] = useState({
        id: result.id,
        group_id:result.group_id,
        name: result.name,
        address: result.address,
        city: result.city,
        state: result.state,
        post_code: result.post_code,
        email: result.email,
        country: result.country,
        phone_no: result.phone_no,
        website: result.website,
        currency: result.currency,
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;
        setGroupID(value)
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }
    function handleSubmit(e) {
        e.preventDefault();
        router.post("/admin/companies/update", values);
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
                            Group Company
                        </Link>
                    </li>
                    <li className="before:content-['/'] ltr:before:mr-2 rtl:before:ml-2">
                        <span>Edit</span>
                    </li>
                </ul>
            </div>
            <div className="pt-5 grid lg:grid-cols-1 grid-cols-1 gap-6">
                <div className="panel" id="forms_grid">
                    <div className="flex items-center justify-between mb-5">
                        <h5 className="font-semibold text-lg dark:text-white-light">
                            Group Company
                        </h5>
                    </div>
                    <div className="mb-5">
                        <form
                            className="space-y-5"
                            onSubmit={handleSubmit}
                            method="post"
                        >
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label htmlFor="group_id">
                                        Group Company
                                    </label>
                                    <select
                                        id="group_id"
                                        className="form-select text-white-dark"
                                        value={groupID}
                                        onChange={handleChange}
                                    >
                                        <option>Choose...</option>
                                        {group_company_list.map((item) => (
                                            <option
                                                key={item.id}
                                                value={item.id}
                                            >
                                                {item.name}
                                            </option>
                                        ))}
                                    </select>
                                    {errors.group_id && (
                                        <div className="text-red-600 text-[14px]">
                                            {errors.group_id}
                                        </div>
                                    )}
                                </div>
                                <div>
                                    <label htmlFor="name">Name</label>
                                    <input
                                        id="name"
                                        type="text"
                                        placeholder="Enter Group of Company Name"
                                        className="form-input"
                                        value={values.name}
                                        onChange={handleChange}
                                    />
                                    {errors.name && (
                                        <div className="text-red-600 text-[14px]">
                                            {errors.name}
                                        </div>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label htmlFor="address">address</label>
                                <input
                                    id="address"
                                    type="text"
                                    placeholder="Enter address"
                                    className="form-input"
                                    value={values.address}
                                    onChange={handleChange}
                                />
                                {errors.address && (
                                    <div className="text-red-600 text-[14px]">
                                        {errors.address}
                                    </div>
                                )}
                            </div>
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label htmlFor="city">City</label>
                                    <input
                                        id="city"
                                        type="text"
                                        placeholder="Enter city"
                                        className="form-input"
                                        value={values.city}
                                        onChange={handleChange}
                                    />
                                    {errors.city && (
                                        <div className="text-red-600 text-[14px]">
                                            {errors.city}
                                        </div>
                                    )}
                                </div>

                                <div>
                                    <label htmlFor="country">Country</label>
                                    <input
                                        id="country"
                                        type="text"
                                        placeholder="Enter Country"
                                        className="form-input"
                                        value={values.country}
                                        onChange={handleChange}
                                    />
                                    {errors.country && (
                                        <div className="text-red-600 text-[14px]">
                                            {errors.country}
                                        </div>
                                    )}
                                </div>
                            </div>

                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label htmlFor="post_code">Post Code</label>
                                    <input
                                        id="post_code"
                                        type="number"
                                        placeholder="Enter Post Code"
                                        className="form-input"
                                        value={values.post_code}
                                        onChange={handleChange}
                                    />
                                </div>

                                <div>
                                    <label htmlFor="email">Email</label>
                                    <input
                                        id="email"
                                        type="email"
                                        placeholder="Enter Email"
                                        className="form-input"
                                        value={values.email}
                                        onChange={handleChange}
                                    />
                                </div>
                            </div>
                            {/* <div>
                                <label htmlFor="gridAddress1">Address</label>
                                <ReactQuill theme="snow" value={text} onChange={setText} />

                                 const [text, setText] = useState(
                                        "<h1>This is a heading text...</h1><br /><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id mattis sed, mattis semper erat. Etiam commodo arcu a mollis consequat. Curabitur pretium auctor tortor, bibendum placerat elit feugiat et. Ut ac turpis nec dui ullamcorper ornare. Vestibulum finibus quis magna at accumsan. Praesent a purus vitae tortor fringilla tempus vel non purus. Suspendisse eleifend nibh porta dolor ullamcorper laoreet. Ut sit amet ipsum vitae lectus pharetra tincidunt. In ipsum quam, iaculis at erat ut, fermentum efficitur ipsum. Nunc odio diam, fringilla in auctor et, scelerisque at lorem. Sed convallis tempor dolor eu dictum. Cras ornare ornare imperdiet. Pellentesque sagittis lacus non libero fringilla faucibus. Aenean ullamcorper enim et metus vestibulum, eu aliquam nunc placerat. Praesent fringilla dolor sit amet leo pulvinar semper. </p><br /><p> Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus, enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare fermentum. Praesent sed ligula at ante tempor posuere a at lorem. </p><br /><p> Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus, enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare fermentum. Praesent sed ligula at ante tempor posuere a at lorem. </p><br /><p> Aliquam diam felis, vehicula ut ipsum eu, consectetur tincidunt ipsum. Vestibulum sed metus ac nisi tincidunt mollis sed non urna. Vivamus lacinia ullamcorper interdum. Sed sed erat vel leo venenatis pretium. Sed aliquet sem nunc, ut iaculis dolor consectetur et. Vivamus ligula sapien, maximus nec pellentesque ut, imperdiet at libero. Vivamus semper nulla lectus, id dapibus nulla convallis id. Quisque elementum lectus ac dui gravida, ut molestie nunc convallis. Pellentesque et odio non dolor convallis commodo sit amet a ante. </p>"
                                    );

                            </div> */}

                            <div className="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                <div className="md:col-span-2">
                                    <label htmlFor="state">State</label>
                                    <input
                                        id="state"
                                        type="text"
                                        placeholder="Enter State"
                                        className="form-input"
                                        value={values.state}
                                        onChange={handleChange}
                                    />
                                </div>
                                <div className="md:col-span-2">
                                    <label htmlFor="phone_no">
                                        Phone Number
                                    </label>
                                    <input
                                        id="phone_no"
                                        type="number"
                                        placeholder="Enter Phone Number"
                                        className="form-input"
                                        value={values.phone_no}
                                        onChange={handleChange}
                                    />
                                </div>
                            </div>

                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label htmlFor="post_code">Website</label>
                                    <input
                                        id="website"
                                        type="text"
                                        placeholder="Enter Website"
                                        className="form-input"
                                        value={values.website}
                                        onChange={handleChange}
                                    />
                                </div>

                                <div>
                                    <label htmlFor="currency">Currency</label>
                                    <input
                                        id="currency"
                                        type="text"
                                        placeholder="Enter Currency"
                                        className="form-input"
                                        value={values.currency}
                                        onChange={handleChange}
                                    />
                                </div>
                            </div>
                            {/* <div>
                                <label className="flex items-center mt-1 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        className="form-checkbox"
                                    />
                                    <span className="text-white-dark">
                                        Check me out
                                    </span>
                                </label>
                            </div> */}
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

Edit.layout = (page) => (
    <MainLayout children={page} title="HR || Edit Group Of Company" />
);

export default Edit;
