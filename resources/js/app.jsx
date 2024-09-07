import React from 'react';
import ReactDOM from 'react-dom/client';
import PetList from './components/PetList.jsx'; // Keeping your PetList component
import AddPet from './components/AddPet.jsx';   // Keeping your AddPet component
import Dropdown from './components/Dropdown.jsx'; // Import the new Dropdown component

function App() {
    // Check if the user is authenticated using meta tags passed from Blade
    const isAuthenticated = !!document.querySelector('meta[name="user-id"]').content; 
    const username = document.querySelector('meta[name="user-name"]')?.content || 'Guest'; 

    return (
        <div>
            {/* Adding the navigation bar with the Dropdown */}
            <nav className="bg-[#6B5B95] border-b border-gray-100">
                <div className="flex justify-between h-16">
                    <div className="flex">
                        <a href="/dashboard" className="text-white px-4">Dashboard</a>
                        <a href="/pets" className="text-white px-4">Available Pets for Adoption</a>
                    </div>
                    {/* Use the Dropdown component */}
                    <Dropdown isAuthenticated={isAuthenticated} username={username} />
                </div>
            </nav>
            
            {/* Your existing AddPet and PetList components */}
            <AddPet />
            <PetList />
        </div>
    );
}

// React 18+ uses createRoot instead of render
const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />);
