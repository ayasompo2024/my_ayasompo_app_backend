import React, { useRef, useState, useCallback, useEffect } from 'react';
import { DataTable } from 'primereact/datatable';
import { Chip } from 'primereact/chip';
import { Column } from 'primereact/column';
import { Image } from 'primereact/image';
import ReactDOM from 'react-dom/client';
import { delReqeust, getRequest, updateRequest } from '../helpers/axios';
import { baseURL, endpoints } from '../constants';
import { Tooltip } from 'primereact/tooltip';
import { ConfirmDialog, confirmDialog } from 'primereact/confirmdialog';
import { Toast } from 'primereact/toast';
import { termAndConditionServices } from '../services/termAndConditionServices';
import moment from 'moment';
import { Button } from 'primereact/button';

export default function TermAndConditionList() {

    const [loading, setLoading] = useState(false);
    const [termAndConditions, setTermAndConditions] = useState([]);

    const toast = useRef(null);

    const columns = [
        { field: 'title', header: 'Title', show: true, with: "180px", frozen: false },
        { field: 'status', header: 'Status', show: true, with: "180px", frozen: false },
        { field: 'created_at', header: 'Created At', show: true, with: "200px", frozen: false },
        { field: 'updated_at', header: 'Updated At', show: true, with: "200px", frozen: false },
        { field: "operation", header: "Operation", show: true, frozen: true, alignFrozen: "right" }
    ];

    /** Operation Action  */
    const reject = () => {
        toast.current.show({ severity: 'warn', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
    }

    /** Delete Customer Account */
    const deleteRecordConfirm = (id) => {
        confirmDialog({
            message: 'Do you want to delete this record?',
            header: 'Delete Confirmation',
            icon: 'pi pi-info-circle',
            position: "bottom-right",
            acceptClassName: "p-button-danger",
            accept: async () => {
                setLoading(true);
                const result = await termAndConditionServices.destroy(id);
                if (result.status === 201 || result.status === 200) {
                    toast.current.show({ severity: 'success', summary: 'Confirmed', detail: "Record is successfully deleted", life: 3000 });
                    await initLoading();
                } else {
                    toast.current.show({ severity: 'error', summary: 'Error', detail: "Somethings was wrong!", life: 3000 })
                }
                setLoading(false);
            },
            reject
        });
    };

    /** Disable || Enable Customer Account */
    const disableRecordConfirm = async (content) => {
        confirmDialog({
            message: Number(content.is_disabled) === 1 ? 'Do you want to enable this record?' : 'Do you want to disable this record?',
            header: 'Status Confirmation',
            icon: 'pi pi-info-circle',
            position: "bottom-right",
            acceptClassName: "p-button-danger",
            accept: async () => {
                setLoading(true);
                const result = await termAndConditionServices.update({
                    status: content.status === 'ACTIVE' ? "DISABLE" : "ACTIVE"
                }, content.id);

                if (result.status === 201 || result.status === 200) {
                    toast.current.show({ severity: 'success', summary: 'Confirmed', detail: "Record is updated successfully", life: 3000 });
                    await initLoading();
                } else {
                    toast.current.show({ severity: 'error', summary: 'Error', detail: "Somethings was wrong!", life: 3000 })
                }
                setLoading(false);
            },
            reject
        });
    }

    /** Loading Initialize Data */
    const initLoading = useCallback(async () => {
        setLoading(true);
        const result = await termAndConditionServices.index();
        if (result.status === 201 || result.status === 200) {
            setTermAndConditions(result.data);
        }
        setLoading(false);
    }, []);

    useEffect(() => {
        initLoading();
    }, [initLoading]);

    return (
        <div className="row">
            <div className='col-12 col-md-12 col-lg-12 mt-3'>
                <div className='d-flex flex-row justify-content-end align-items-center'>
                    <Button
                        style={{ borderRadius: "5px" }}
                        label='Create'
                        size='small'
                        severity='danger'
                        onClick={() => window.location.replace(`${baseURL}/admin/${endpoints.termAndCondition}/create`)}
                    />
                </div>
            </div>

            <div className='col-12 col-md-12 col-lg-12 mt-3'>
                <DataTable
                    key={"id"}
                    value={termAndConditions ?? []}
                    scrollable
                    scrollHeight="500px"
                >
                    {columns.map((col, index) => {
                        return (
                            <Column
                                key={`term_and_condition_list_${col.field}_${index}`}
                                field={col.field}
                                header={col.header}
                                frozen={col.frozen ?? false}
                                alignFrozen={col.alignFrozen ?? "right"}
                                style={col.with ? { minWidth: `${col.with}` } : ""}
                                body={(content) => {
                                    switch (col.field) {
                                        case "status":
                                            return (
                                                <Chip
                                                    label={content[col.field] === 'ACTIVE' ? 'ACTIVE' : 'DISABLE'}
                                                    className={content[col.field] === 'ACTIVE' ? 'bg-success' : 'bg-danger'}
                                                    icon="pi pi-wave-pulse"
                                                />
                                            )
                                        case "created_at":
                                            return (
                                                <span> {moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A")} </span>
                                            );
                                        case "updated_at":
                                            return (
                                                <span> {moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A")} </span>
                                            );
                                        case "deleted_at":
                                            return (
                                                <span> {moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A")} </span>
                                            );
                                        case "operation":
                                            return (
                                                <div className='btn-group'>
                                                    <div className='tooltip-btn' onClick={() => deleteRecordConfirm(content.id)}>
                                                        <Tooltip target=".pi-trash" content="Delete" position="top" event="hover" />
                                                        <i className='pi pi-trash' style={{ color: "#DC3545" }}></i>
                                                    </div>

                                                    <div className='tooltip-btn' onClick={() => disableRecordConfirm(content)}>
                                                        <Tooltip target=".pi-ban" content="Enable / Disable" position="top" event="hover" />
                                                        <i className='pi pi-ban' style={{ color: "#FFC107" }}></i>
                                                    </div>

                                                    <div className='tooltip-btn' onClick={() => window.location.replace(`${baseURL}/admin/${endpoints.termAndCondition}/${content.id}`)}>
                                                        <Tooltip target=".pi-file-edit" content="Edit" position="top" event="hover" />
                                                        <i className='pi pi-file-edit' style={{ color: "#17A2B8" }}></i>
                                                    </div>
                                                </div>
                                            )
                                        default:
                                            return content[col.field];
                                    }
                                }
                                }
                            />
                        )
                    })}
                </DataTable>
            </div>

            <Toast ref={toast} />
            <ConfirmDialog />
        </div>

    );
}

if (document.getElementById('term-and-condition-list')) {
    const root = ReactDOM.createRoot(document.getElementById('term-and-condition-list'));
    root.render(<TermAndConditionList />);
}