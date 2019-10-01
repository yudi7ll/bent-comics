import React from 'react';
import { Line } from 'react-chartjs-2';

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
          <Line
                data={data}
                options={{ maintainAspectRatio: false }}
          />
        </>
    );
}

export default Dashboard;
