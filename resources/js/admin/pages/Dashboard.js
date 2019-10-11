import React from 'react';
import { Pie } from 'react-chartjs-2';

const Dashboard = () => {
    const data = {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
          label: 'Income Reports',
          data: [12, 43, 56, 65, 1]
        }]
    };

    return (
        <>
          <Pie
                data={data}
                options={{ maintainAspectRatio: false }}
          />
        </>
    );
}

export default Dashboard;
