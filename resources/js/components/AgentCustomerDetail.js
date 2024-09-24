import { useCallback, useEffect, useState } from "react"

export const AgentCustomerDetail =({ dataSource }) => {

    const [agent, setAgent] = useState(null);

    const mount = useCallback(async () => {
        if(dataSource) {
            setAgent(dataSource);
        }
    },[dataSource]);

    useEffect(() => {
        mount();
    }, [mount]);

    return(
        <>
            { agent && (
                <div className="row">
                    <div className="col-12 col-md-6 col-lg-6">
                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> Customer ID </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.customer_id} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> App Name </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.agent_name} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> Email </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.email} </span>
                        </div>
                        
                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> License No. </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.license_no} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> Agent Type </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.agent_type} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> Expired Date </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.expired_date} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> Title </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.title} </span>
                        </div>

                        <div className="row">
                            <span className="col-12 col-md-4 col-lg-4 normal-text"> Achievement </span>
                            <span className="col-12 col-md-8 col-lg-8 normal-text"> {agent.achievement} </span>
                        </div>
                    </div>
                </div>
            )}
        </>
    )
}