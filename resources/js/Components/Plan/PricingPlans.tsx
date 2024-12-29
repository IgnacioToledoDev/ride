import React from 'react';
// @ts-ignore
import {Props} from "@headlessui/react/dist/types";

interface Plan {
    id: number,
    name: string,
    storageLimit: number,
    bandwidthLimit: number,
    ramLimit: number,
    description: string,
    isPublic: boolean,
    isPopular: boolean
    pricing: Pricing,
    features: Feature[]
}

interface Plans {
    plans: Plan[]
}

interface Pricing {
    planId: number,
    price: number,
    billingCycle: billingCycle
}

interface Feature {
    key: number;
    description: string
}

enum billingCycle {
    MONTHLY = 'Monthly',
    YEARLY = 'Yearly'
}

const PricingPlans = ({ plans } : Props<Plans>) => {
    return (
        <div className="bg-gray-100 py-12">
            <div className="container mx-auto px-6">
                <h2 className="text-3xl font-bold text-center text-gray-800 mb-8">
                    Our Pricing Plans
                </h2>


                <div className="flex flex-wrap justify-center pb-2.5" role="group">
                    <button type="button"
                            className="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        Monthly
                    </button>
                    <button type="button"
                            className="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        Yearly
                    </button>
                </div>

                <div className="flex flex-wrap justify-center gap-6">
                    {plans.map((plan: Plan
                        , index: number) => (
                        <div
                            key={index}
                            className={`w-full sm:w-1/3 lg:w-1/4 p-6 border rounded-lg shadow-md bg-white ${
                                plan.isPopular ? "border-blue-500" : "border-gray-300"
                            }`}
                        >
                            {plan.isPopular && (
                                <div
                                    className="text-sm uppercase text-white bg-blue-500 px-4 py-1 rounded-full inline-block mb-4">
                                    Most Popular
                                </div>
                            )}
                            <h3 className="text-2xl font-semibold text-gray-800 mb-4">
                                {plan.name}
                            </h3>
                            <div className="text-4xl font-bold text-gray-900 mb-4">
                                ${plan.pricing.price}
                                <span className="text-base text-gray-500"> {plan.pricing.billingCycle}</span>
                            </div>
                            <ul className="mb-6">
                                {plan.features.map((feature: Feature, i: number) => (
                                    <li key={i} className="text-gray-600 mb-2">
                                        ✓ {feature.description}
                                    </li>
                                ))}
                            </ul>
                            <button
                                className="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                                Choose Plan
                            </button>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default PricingPlans;
