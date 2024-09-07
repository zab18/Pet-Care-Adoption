import React, { useState } from 'react';

function Dropdown({ isAuthenticated, username }) {
    const [open, setOpen] = useState(false);

    return (
        <div className="relative">
            <button
                onClick={() => setOpen(!open)} // Toggle the dropdown when clicking
                className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#6B5B95] hover:text-gray-200 focus:outline-none transition ease-in-out duration-150"
            >
                <div>{isAuthenticated ? username : 'zabia'}</div>
                <div className="ms-1">
                    <svg className="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd" />
                    </svg>
                </div>
            </button>
            {open && (
                <div style={{ border: '2px solid red' }} className="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg py-1">
                    {isAuthenticated ? (
                        <>
                            <a href="/profile/edit" className="block px-4 py-2 text-sm text-gray-700">Profile</a>
                            <form method="POST" action="/logout">
                                <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]').getAttribute('content')} />
                                <button
                                    type="submit"
                                    className="block w-full text-left px-4 py-2 text-sm text-gray-700"
                                >
                                    Log Out
                                </button>
                            </form>
                        </>
                    ) : (
                        <a href="/login" className="block px-4 py-2 text-sm text-gray-700">Log In</a>
                    )}
                </div>
            )}
        </div>
    );
}

export default Dropdown;
